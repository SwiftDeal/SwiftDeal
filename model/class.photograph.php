<?php
require_once($dir_model.'class.database.php');
require_once('/home/content/32/11823432/html/oldsd/public/parameters.php');
ini_set('memory_limit', '-1');
/**
* Photograph
*/
class Photograph extends DatabaseObject {
	protected static $table_name = "photographs";
	public $id;
	public $user_id;
	public $item_id;
	public $filename;
	public $type;
	public $size;
	public $created;
	public $viewed;

	private $temp_path;
	protected $upload_dir="images";
	public $noimage = "noimage.jpg";
	public $errors = array();
	protected static $db_fields=array('id', 'user_id', 'item_id', 'filename', 'type', 'size', 'created', 'viewed');
	protected $upload_errors = array(
		UPLOAD_ERR_OK 			=> "No errors.",
		UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
		UPLOAD_ERR_NO_FILE 		=> "No file.",
		UPLOAD_ERR_NO_TMP_DIR 	=> "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE 	=> "Can't write to disk.",
		UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
		);
	
	public function attach_file($file, $key) {
		if (!$file || empty($file) || !is_array($file)) {
			$this->errors[] = "No file was uploaded.";
			return false;
		} elseif ($file['error'][$key] != 0) {
			$this->errors[] = $this->upload_errors[$file['error'][$key]];
			return false;
		} else {
			$this->temp_path = $file['tmp_name'][$key];
			$this->filename  = rand(10, 10000).rand(10, 10000).'.jpg';
			$this->type 	 = $file['type'][$key];
			$this->size 	 = $file['size'][$key];
			return true;
		}
	}

	public function textMark($oldimage_name, $new_image_name){
		$font_path = "comic.ttf"; // Font file
		$font_size = 10; // in pixcels
		$water_mark_text_2 = "www.swiftdeal.in"; // Watermark Text

		list($owidth,$oheight) = getimagesize($oldimage_name);
		$width = $height = 300;
		$image = imagecreatetruecolor($width, $height);

		$source = getimagesize($oldimage_name);
		$source_mime = $source['mime'];

		switch ($source_mime) {
			case 'image/jpeg':
				$image_src = imagecreatefromjpeg($oldimage_name);
				break;
			case 'image/png':
				$image_src = imagecreatefrompng($oldimage_name);
				break;
			case 'image/gif':
				$image_src = imagecreatefromgif($oldimage_name);
				break;
			default:
				$image_src = imagecreatefromjpeg($oldimage_name);
				break;
		}

		imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
		$blue = imagecolorallocate($image, 79, 166, 185);
		imagettftext($image, $font_size, 0, 68, 190, $blue, $font_path, $water_mark_text_2);
		if(imagejpeg($image, $new_image_name)){ return true;}
	}

	public function waterMark($file, $destination){
		$watermark = imagecreatefrompng('logo.png');
		$source = getimagesize($file);
		$source_mime = $source['mime'];

		switch ($source_mime) {
			case 'image/jpeg':
				$image = imagecreatefromjpeg($file);
				imagecopy($image, $watermark, 10, 10, 0, 0, imagesx($watermark), imagesy($watermark));
				if(imagejpeg($image, $destination)) return true; else return false;
				break;
			case 'image/png':
				$image = imagecreatefrompng($file);
				imagecopy($image, $watermark, 10, 10, 0, 0, imagesx($watermark), imagesy($watermark));
				if(imagepng($image, $destination)) return true; else return false;
				break;
			case 'image/gif':
				$image = imagecreatefromgif($file);
				imagecopy($image, $watermark, 10, 10, 0, 0, imagesx($watermark), imagesy($watermark));
				if(imagegif($image, $destination)) return true; else return false;
				break;
			default:
				$image = imagecreatefromjpeg($file);
				imagecopy($image, $watermark, 10, 10, 0, 0, imagesx($watermark), imagesy($watermark));
				if(imagejpeg($image, $destination)) return true; else return false;
				break;
		}
	}

	public function save() {
		global $dir_uploads;
		if (isset($this->id)) {
			$this->update();
		} else {
			if (!empty($this->errors)) { return false;}
			if (empty($this->filename) || empty($this->temp_path)) {	
				$this->errors[]= "The file location was not available.";
				return false;
			}
			$target_path = $dir_uploads.$this->upload_dir ."/".$this->filename;
			if (move_uploaded_file($this->temp_path, $target_path)) {
				$imagepath = $this->filename;
				$save = $target_path;
				$file = $target_path;

					list($width, $height) = getimagesize($file);
					$tn = imagecreatetruecolor($width, $height) ;
					switch ($this->type) {
						case 'image/jpeg':
							$image = imagecreatefromjpeg($file);
							break;
						case 'image/png':
							$image = imagecreatefrompng($file);
							break;
						case 'image/gif':
							$image = imagecreatefromgif($file);
							break;
						default:
							exit;
							break;
					}
					
					imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height);
					switch ($this->type){
						case 'image/jpeg':
							imagejpeg($tn, $save, 60);
							break;
						case 'image/png':
							imagepng($tn, $save, 6);
							break;
						case 'image/gif':
							imagegif($tn, $save);
							break;
						default:
							exit;
							break;
					}

					//thumbnail
					$save = $dir_uploads.$this->upload_dir."/sml_".$this->filename;
					$file = $target_path;

					list($width, $height) = getimagesize($file);
					$modwidth = 130;
					$modheight = 170;
					$tn = imagecreatetruecolor($modwidth, $modheight);
					switch ($this->type){
						case 'image/jpeg':
							$image = imagecreatefromjpeg($file);
							break;
						case 'image/png':
							$image = imagecreatefrompng($file);
							break;
						case 'image/gif':
							$image = imagecreatefromgif($file);
							break;
						default:
							exit;
							break;
					}

					imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height);

					switch ($this->type){
						case 'image/jpeg':
							imagejpeg($tn, $save, 60);
							break;
						case 'image/png':
							imagepng($tn, $save, 6);
							break;
						case 'image/gif':
							imagegif($tn, $save);
							break;
						default:
							exit;
							break;
					}

				if ($this->create()) {
					unset($this->temp_path);
					return true;
				}
			}else {
				$this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
				return false;
			}
		}
	}

	public function destroy() {
		if ($this->delete()) {
			$target_path = $this->image_path();
			return unlink($target_path) ? true : false;
		} else {
			return false;
		}
	}

	public function image_path() {
		$userImage = 'http://cdn1.cloudstuffs.com/uploads/'.$this->upload_dir."/".$this->filename;
		return $userImage;
	}
	
	public function image_cache($width, $height) {
		global $dir_uploads;
		$userImage = 'http://cdn1.cloudstuffs.com/'.$dir_uploads.$this->upload_dir."/".$this->filename.'?width='.$width.'&height='.$height.'&mode=fit';
		return $userImage;
	}
	
	public function image_path_thumb() {
		global $dir_uploads;
		if($this->size < 1363150) $userImage = $dir_uploads.$this->upload_dir."/sml_".$this->filename;
		else $userImage = $dir_uploads.$this->upload_dir."/".$this->filename;
		return $userImage;
	}
	
	public function image_thumb_cdn() {
		$userImage = 'http://cdn1.cloudstuffs.com/uploads/'.$this->upload_dir."/sml_".$this->filename;
		return $userImage;
	}

	public function size_as_text(){
		if ($this->size <1024) {
			return "{$this->size} bytes";
		} elseif ($this->size <1048576) {
			$size_kb = round($this->size/1024);
			return "{$size_kb} KB";
		} else {
			$size_mb = round($this->size/1048576);
			return "{$size_mb} MB";
		}	
	}

	public function comments() {
		return Comment::find_comments_on($this->id);
	}

	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
	}

	public static function find_by_id($type="", $id=0) {
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE {$type} =".$database->escape_value($id)." LIMIT 1");
		$default_result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id = 1 LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : array_shift($default_result_array) ;
	}
	
	public static function find_photo($id=0) {
		global $database;
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE item_id =".$database->escape_value($id));
	}

	public static function find_by_sql($sql="") {
		global $database;
		$result_set = $database->query($sql);
		$object_array = array();
		while ($row = $database->fetch_array($result_set)) {
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}

	public static function count_all() {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name;
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}

	private static function instantiate($record) {
		$object = new self;
		// $object->username  = $record['username'];
		// $object->firstname = $record['first_name'];
		// $object->lastname  = $record['last_name'];

		foreach ($record as $attribute => $value) {
			if ($object->has_attribute($attribute)) {
				$object->$attribute = $value;
			}
		}
		return $object;
	}

	private function has_attribute($attribute) {
		$object_vars = $this->attributes();
		return array_key_exists($attribute, $object_vars);
	}

	protected function attributes() {
		$attributes = array();
		foreach(self::$db_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}

	protected function sanitized_attributes() {
		global $database;
		$clean_attributes = array();
		foreach ($this->attributes() as $key => $value) {
			$clean_attributes[$key] = $database->escape_value($value);
		}
		return $clean_attributes;
	}

	public function create() {
		global $database;
		$attributes = $this->sanitized_attributes();
		$sql  = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";

		if ($database->query($sql)) {
			$this->id = $database->insert_id();
			return true;
		} else {
			return false;
		}
	}

	protected function update() {
		global $database;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach ($attribute_pairs as $key => $value) {
			$attribute_pairs[] = "{$key} = '{$value}'";
		}
		$sql  = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id = ".$database->escape_value($this->id);
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	protected function delete() {
		global $database;
		$sql  = "DELETE FROM ".self::$table_name;
		$sql .= " WHERE id = ".$database->escape_value($this->id);
		$sql .= " LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;	
	}
}

?>