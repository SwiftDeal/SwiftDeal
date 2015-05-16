<?php
require_once($dir_model.'class.database.php');

/**
* Company
*/
class Company extends DatabaseObject{

	protected static $table_name = "company";
	public $id;
	public $user_id;
	public $name;
	public $about;
	public $category;
	public $trade;
	public $operating_city;
	public $address;
	public $job_vacancy;
	public $item_request;
	public $phone;
	public $online_payment;
	public $cod;
	public $online_presence;
	public $validity;
	public $created;
	public $updated;

	protected static $db_fields = array('id', 'user_id', 'name', 'about', 'category', 'trade', 'operating_city', 'address', 'job_vacancy', 
										'item_request', 'phone', 'online_payment', 'cod', 'online_presence', 'validity', 'created', 'updated');

	public static function login_time($id) {
		global $database, $time;
		$sql  = "UPDATE ".self::$table_name." SET ";
		$sql .= "last_login = '{$time}' ";
		$sql .= "WHERE id = {$id}";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	
	public function send_notification($user_id=0) {
		$user = User::find_by_id($item->user_id);
		$to = $user->email;
		$subject = "{$item->title} at Swiftdeal";
		$message 	=<<<EMAILBODY
Hi {$user->name},

Your Account {$this->name} is successfully Created. You will be notified if someone views or comment at it.
Tips :
	1.Login here http://seller.swiftdeal.in
	2.Improve Item name and write good description product listing is free.
	3.Promote your Product.
	4.Share your product on facebook by liking it on SwiftDeal.in


Details:
Name: {$this->name}
Category: {$this->category}
At {$this->created}, {$this->name} at:
{$this->address}

Wishing you luck!!!
SwiftDeal India Team.

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
	
	public static function status($status, $id) {
		global $database;
		$sql  = "UPDATE ".self::$table_name." SET ";
		$sql .= "active = {$status} ";
		$sql .= "WHERE id = {$id}";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public static function authenticate($email="", $password="") {
		global $database;
		$email = $database->escape_value($email);
		$password = $database->escape_value($password);

		$sql  = "SELECT * FROM ".self::$table_name." ";
		$sql .= "WHERE email = '{$email}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false ;
	}
	
	public static function authenticate_phone($phone="", $password="") {
		global $database;
		$phone = $database->escape_value($phone);
		$password = $database->escape_value($password);

		$sql  = "SELECT * FROM ".self::$table_name." ";
		$sql .= "WHERE phone = '{$phone}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false ;
	}
	
	public static function authenticate_admin($email="", $password="") {
		global $database;
		$email = $database->escape_value($email);
		$password = $database->escape_value($password);

		$sql  = "SELECT * FROM ".self::$table_name." ";
		$sql .= "WHERE email = '{$email}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "AND auth = 1 ";
		$sql .= "LIMIT 1";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false ;
	}

	//datbase object class file
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." ORDER BY id DESC");
	}

	public static function find_all_type($type="") {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE type = '{$type}' ORDER BY id DESC");
	}

	public static function find_all_admin() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE auth=1 OR auth=2");
	}

	public static function find_by_id($id=0) {
		$result_array = static::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id = {$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false ;
	}
	
	public static function find_by_userid($id=0) {
		$result_array = static::find_by_sql("SELECT * FROM ".self::$table_name." WHERE user_id = {$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false ;
	}
	
	public static function find_by_email($email="") {
		$result_array = static::find_by_sql("SELECT * FROM ".self::$table_name." WHERE email = '{$email}' LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false ;
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