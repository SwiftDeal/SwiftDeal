<?php
include_once $dir_model.'class.database.php';
/**
* Search
*/
class Search extends Item{

	public $keywords;
	public $dealcity;
	public $page;
	public $per_page;
	public $total_results = 0;
	public $similar_words = array();
	public $citys = array('Ahmedabad', 'Bengaluru', 'Bangalore', 'Chandigarh', 'Chennai', 'Delhi', 'Gurgaon', 'Hyderabad', 'Secunderabad', 'Kolkatta', 'Mumbai', 'Noida', 'Pune', 'Anantapur', 'Guntakal', 'Guntur', 'Hyderabad', 'Secunderabad', 'kakinada', 'kurnool', 'Nellore', 'Nizamabad', 'Rajahmundry', 'Tirupati', 'Vijayawada', 'Visakhapatnam', 'Warangal', 'Andra Pradesh', 'Itanagar', 'Arunachal Pradesh', 'Guwahati', 'Silchar', 'Assam', 'Bhagalpur', 'Patna', 'Bihar', 'Bhillai', 'Bilaspur', 'Raipur', 'Chhattisgarh', 'Panjim', 'Panaji', 'Vasco Da Gama', 'Goa', 'Ahmedabad', 'Anand', 'Ankleshwar', 'Bharuch', 'Bhavnagar', 'Bhuj', 'Gandhinagar', 'Gir', 'Jamnagar', 'Kandla', 'Porbandar', 'Rajkot', 'Surat', 'Vadodara', 'Baroda', 'Valsad', 'Vapi', 'Gujarat', 'Ambala', 'Chandigarh', 'Faridabad', 'Gurgaon', 'Hisar', 'Karnal', 'Kurukshetra', 'Panipat', 'Rohtak', 'Haryana', 'Dalhousie', 'Dharmasala', 'Kulu\Manali', 'Shimla', 'Himachal Pradesh', 'Jammu', 'Srinagar', 'Jammu and Kashmir', 'Bokaro', 'Dhanbad', 'Jamshedpur', 'Ranchi', 'Jharkhand', 'Bengaluru/Bangalore', 'Belgaum', 'Bellary', 'Bidar', 'Dharwad', 'Gulbarga', 'Hubli', 'Kolar', 'Mangalore', 'Mysoru/Mysore', 'Karnataka', 'Calicut', 'Cochin', 'Ernakulam', 'Kannur', 'Kochi', 'Kollam', 'Kottayam', 'Kozhikode', 'Palakkad', 'Palghat', 'Thrissur', 'Trivandrum', 'Kerela', 'Bhopal', 'Gwalior', 'Indore', 'Jabalpur', 'Ujjain', 'Madhya Pradesh', 'Ahmednagar', 'Aurangabad', 'Jalgaon', 'Kolhapur', 'Mumbai', 'Mumbai Suburbs', 'Nagpur', 'Nasik', 'Navi Mumbai', 'Pune', 'Solapur', 'Maharashtra', 'Imphal', 'Manipur', 'Shillong', 'Meghalaya', 'Aizawal', 'Mizoram', 'Dimapur', 'Nagaland', 'Bhubaneshwar', 'Cuttak', 'Paradeep', 'Puri', 'Rourkela', 'Orissa', 'Amritsar', 'Bathinda', 'Chandigarh', 'Jalandhar', 'Ludhiana', 'Mohali', 'Pathankot', 'Patiala', 'Punjab', 'Ajmer', 'Jaipur', 'Jaisalmer', 'Jodhpur', 'Kota', 'Udaipur', 'Rajasthan', 'Gangtok', 'Sikkim', 'Chennai', 'Coimbatore', 'Cuddalore', 'Erode', 'Hosur', 'Madurai', 'Nagerkoil', 'Ooty', 'Salem', 'Thanjavur', 'Tirunalveli', 'Trichy', 'Tuticorin', 'Vellore', 'Tamil Nadu', 'Agartala', 'Tripura', 'Chandigarh', 'Dadra & Nagar Haveli-Silvassa', 'Daman & Diu', 'Pondichery', 'Agra', 'Aligarh', 'Allahabad', 'Bareilly', 'Faizabad', 'Ghaziabad', 'Gorakhpur', 'Kanpur', 'Lucknow', 'Mathura', 'Meerut', 'Moradabad', 'Noida', 'Varanasi/Banaras', 'Uttar Pradesh', 'Dehradun', 'Roorkee', 'Uttaranchal', 'Asansol', 'Durgapur', 'Haldia', 'Kharagpur', 'Kolkatta', 'Siliguri', 'West Bengal');
	
	public function search_results(){
		$where = "";
		if($this->check_city()){
			return $this->search_city();
		}
		$keywords = preg_split('/[\s]+/', $this->keywords);
		$total_keywords = count($keywords);
		$table_cols = array('title', 'category');

		foreach ($keywords as $key => $keyword) {
			$changePlural = $this->changePlural($keyword);
			$where .= "{$table_cols[0]} LIKE '%$keyword%' OR {$table_cols[0]} LIKE '%$changePlural%' OR ";
		}
		
		foreach ($keywords as $key => $keyword) {
			$where .= "{$table_cols[1]} LIKE '%$keyword%' OR {$table_cols[1]} LIKE '%$changePlural%'";
			if ($key != $total_keywords-1) {
				$where .= " OR ";
			}
		}
		
		$sql  = "SELECT SQL_CALC_FOUND_ROWS id FROM ".self::$table_name." 
				WHERE ({$where}) AND 
				(city LIKE '%$this->dealcity%') AND 
				(validity=1)
				ORDER BY id DESC LIMIT {$this->per_page} 
				OFFSET {$this->offset()}";
		$result = self::find_by_sql($sql);
		$results_num = count($result);
		if($results_num == 0){
			// $this->find_next_similar($this->keywords);
			// $new_result = $this->search_results();
			// $count = mysql_fetch_array(mysql_query("SELECT FOUND_ROWS() AS total"));
			// $this->total_results = $count['total'];
			return false;
		}else{
			$count = mysql_fetch_array(mysql_query("SELECT FOUND_ROWS() AS total"));
			$this->total_results = $count['total'];
			return $result;
		}

		//$this->sort_result($result);
	}
	
	public function search_results_new(){
		$where = "";
		$keywords = preg_split('/[\s]+/', $this->keywords);
		$total_keywords = count($keywords);
		$table_cols = array('title', 'category');
		
		if($total_keywords == 1){
			foreach($this->citys as $city){
				if(strtolower($this->keywords) == strtolower($city)){
					return $this->search_city();
				}
			}
		}

		foreach ($keywords as $key => $keyword) {
			$changePlural = $this->changePlural($keyword);
			$where .= "{$table_cols[0]} LIKE '%$keyword%' OR {$table_cols[0]} LIKE '%$changePlural%' OR ";
		}
		
		foreach ($keywords as $key => $keyword) {
			$where .= "{$table_cols[1]} LIKE '%$keyword%' OR {$table_cols[1]} LIKE '%$changePlural%'";
			if ($key != $total_keywords-1) {
				$where .= " OR ";
			}
		}
		
		$sql  = "SELECT SQL_CALC_FOUND_ROWS id FROM ".self::$table_name." 
				WHERE ({$where}) AND 
				(city LIKE '%$this->dealcity%') 
				AND (validity=1) 
				ORDER BY id DESC LIMIT {$this->per_page} 
				OFFSET {$this->offset()}";
		$result = self::find_by_sql($sql);
		$results_num = count($result);
		
		if($results_num == 0){
			$this->find_next_similar($this->keywords);
			$new_result = $this->search_results();
			$count = mysql_fetch_array(mysql_query("SELECT FOUND_ROWS() AS total"));
			$this->total_results = $count['total'];
			return $new_result;
		}else{
			$count = mysql_fetch_array(mysql_query("SELECT FOUND_ROWS() AS total"));
			$this->total_results = $count['total'];
			return $result;
		}

		//$this->sort_result($result);
	}
	
	public function find_next_similar($word){
		$query = "SELECT word FROM english WHERE SUBSTRING(word, 1, 1) = '".mysql_real_escape_string(substr($word, 0, 1))."'";
		$result = mysql_query($query);
		$max=0;
		if($result){
			while ($row = mysql_fetch_array($result)) {
				similar_text($row['word'], $word, $percent);
				if($percent > 80){
					if($percent > $max){
						$max = $percent;
						$most_similar_word = $row['word'];
					}
				}
				//echo $row['word']." ".$percent."%<br>";
			}
			
			$this->keywords = $most_similar_word;
		}else{
			log_action('error', 'next_similr_word', "{$word}");
		}
	}
	
	//city Search
	public function search_city(){
		$sql = "SELECT SQL_CALC_FOUND_ROWS id FROM ".self::$table_name." 
		WHERE city = '{$this->keywords}' AND (validity=1) 
		ORDER BY id DESC LIMIT {$this->per_page} 
		OFFSET {$this->offset()}";
		$sql2 = "SELECT id FROM ".self::$table_name." WHERE city = '{$this->keywords}'";
		$count = mysql_num_rows(mysql_query($sql2));
		$this->total_results = $count;
		return self::find_by_sql($sql);
	}
	
	public function check_city(){
		foreach($this->citys as $city){
			if(strtolower($this->keywords) == strtolower($city)){
				return true;
			}
		}
		return false;
	}
	
	public function similarity($string1, $string2){
		similar_text($string1, $string2, $result);
		return $result;
	}
	
	public function offset(){
		return ($this->page-1) * $this->per_page;
	}
	
	public function changePlural($word){
		$length = strlen($word);
		$lastLetter = substr($word, $length-1, $length);
		if(strtolower($lastLetter) == 's')
			return substr($word, 0, $lenght-1);
		else
			return $word.'s';
	}
}
?>