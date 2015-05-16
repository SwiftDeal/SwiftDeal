<?php
require_once($dir_model.'class.database.php');

/**
* RequestedItem
*/

class RequestedItem extends DatabaseObject {
	protected static $table_name = "requested_item";
	public $id;
	public $user_id;
	public $name;
	public $email;
	public $phone;
	public $created;
	public $item_name;
	public $address;
	public $city;
	public $viewed;
	public $mail_count;
	public $validity;
	
	protected static $db_fields=array('id', 'user_id', 'name', 'email', 'phone', 'created', 'item_name', 'address', 
		'city', 'viewed', 'mail_count', 'validity');
		
	public static function solved($id) {
		global $database;
		$sql  = "UPDATE ".self::$table_name." SET ";
		$sql .= "validity = 0 ";
		$sql .= "WHERE id = {$id}";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
		
	public static function mail_counter($id) {
		global $database;
		$sql  = "UPDATE ".self::$table_name." SET ";
		$sql .= "mail_count = mail_count+1 ";
		$sql .= "WHERE id = {$id}";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public function send_notification($found_id=0, $item_id=0) {
		$item = Item::find_by_id('id', $item_id);
		$to = $this->email;
		$subject = "{$this->keywords} at Swiftdeal";
		$message 	=<<<EMAILBODY
Hi there,

Someone has added {$this->keywords} to our our database.You told us to notify you.

Details:
Title: {$item->title}
Category : {$item->category}
At {$item->created}
Description : {$item->description}

Item Link : https://swiftdeal.in/viewitem.php?item_id={$item_id}

Wishing you luck!!!
Swiftdeal Team.

Unsubscribe : https://swiftdeal.in/public/notfound.php?subscribe=false&email={$this->email}

EMAILBODY;

		$from = "Swiftdeal.in <info@swiftdeal.in>";
		$headers = "From: {$from}\n";
		$headers .= "Reply-To: {$from}\n";
		$headers .= "X-Mailer: PHP/".phpversion()."\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
	
		$result = mail($to, $subject, $message, $headers);
		return $result;
	}
	
	//datbase object class file

	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
	}

	public static function find_by_id($given_id, $id=0) {
		$result_array = static::find_by_sql("SELECT * FROM ".self::$table_name." WHERE {$given_id} = {$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false ;
	}
	
	public static function find_on_user($id=0) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE user_id = {$id}");
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

	private static function instantiate($record) {
		$object = new self;
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

	public static function count_all() {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name;
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}

	public static function count_all_ritem($user_id) {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name." WHERE user_id = {$user_id}";
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}
	
	public function save() {
		return isset($this->id) ? $this->update() : $this->create();
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
	
	public function update() {
		global $database;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach ($attributes as $key => $value) {
			$attribute_pairs[] = "{$key} = '{$value}'";
		}
		$sql  = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id = ".$database->escape_value($this->id);
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		$sql  = "DELETE FROM ".self::$table_name;
		$sql .= " WHERE id = ".$database->escape_value($this->id);
		$sql .= " LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;	
	}
}

?>