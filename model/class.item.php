<?php
require_once($dir_model.'class.database.php');
/**
* Item
*/
class Item extends DatabaseObject {
	protected static $table_name = "items";
	public $id;
	public $user_id;
	public $title;
	public $category;
	public $type;
	public $cost;
	public $description;
	public $created;
	public $updated;
	public $viewed;
	public $city;
	public $validity;
	public $weekly_mail_count;

	private $temp_path;
	protected $upload_dir="uploads";
	
	protected static $db_fields=array('id', 'user_id', 'title', 'category', 'type', 'cost',
		'description', 'created', 'updated', 'viewed', 'city', 'validity', 'weekly_mail_count');
		
	public static function weekly_mail_count($id) {
		global $database;
		$sql  = "UPDATE ".self::$table_name." SET ";
		$sql .= "weekly_mail_count = weekly_mail_count+1 ";
		$sql .= "WHERE id = {$id}";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	public static function view_counter($id) {
		global $database;
		$sql  = "UPDATE ".self::$table_name." SET ";
		$sql .= "viewed = viewed+1 ";
		$sql .= "WHERE id = {$id}";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	public static function approve_item($id) {
		global $database;
		$sql  = "UPDATE ".self::$table_name." SET ";
		$sql .= "validity = 1 ";
		$sql .= "WHERE id = {$id}";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	public function weekly_summaries() {
		$user = User::find_by_id($this->user_id);
		$to = $user->email;
		$subject = "{$this->title} at Swiftdeal";
		$message 	=<<<EMAILBODY
Hi {$user->name},

Your {$this->title} is successful on our site.You will be notified if someone views or comment at it.
Your Product was viewed {$this->viewed} times.
Tips for fast selling of your Product.
	1.Try viewing it daily to check if any one has commented on it at http://swiftdeal.in/viewitem.php?item_id={$this->id}
	2.Improve tags and names write good description. you can edit your product at https://swiftdeal.in/public/addstuffs.php?query=edititem&item_id={$this->id}
	3.Get Help from others, make a report on our site we will feel good to help you.
	
Is your Items sold you can delete it by clicking here : https://swiftdeal.in/public/login.php


Details:
Title: {$this->title}
Category : {$this->category}
At {$this->created}, {$user->name} wrote:
{$this->content}

Wishing you luck!!!
Swiftdeal Team.

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

	public function send_notification($id=0) {
		$item = Item::find_by_id('id', $id);
		$user = User::find_by_id($item->user_id);
		$to = $user->email;
		$subject = "{$item->title} at Swiftdeal";
		$message 	=<<<EMAILBODY
Hi {$user->name},

Your {$item->title} was successfully added to our database.You will be notified if someone views or comment at it.
Tips for fast selling of your Product.
	1.Try viewing it daily to check if any one has commented on it at https://swiftdeal.in/public/profile.php.
	2.Improve Item name and write good description.
	3.Always mention your address and phone number when adding product.
	4.Share your product on facebook by liking it on SwiftDeal.in


Details:
Title: {$item->title}
Category : {$item->category}
At {$this->created}, {$this->name} wrote:
{$this->content}

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
	
	public function notify_moderator($id=0) {
		$item = Item::find_by_id('id', $id);
		$to = 'saud.aktr@yahoo.com';
		$subject = "{$item->title} at Swiftdeal";
		$message 	=<<<EMAILBODY
Hi,

{$item->title} was successfully at our database.You will be notified if someone views or comment at it.

Details:
Title: {$item->title}
Category : {$item->category}
At {$this->created}, {$this->name} wrote:
{$this->content}

Check it : http://swiftdeal.in/viewitem.php?item_id={$item->id}

Wishing you luck!!!
Swiftdeal Team.

EMAILBODY;

		$from = "SwiftDeal.in <info@swiftdeal.in>";
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
		return self::find_by_sql("SELECT id FROM ".self::$table_name." ORDER BY id DESC");
	}
	
	public static function popular_items($limit="9") {
		return self::find_by_sql("SELECT id,title FROM ".self::$table_name." ORDER BY viewed DESC LIMIT {$limit}");
	}

	public static function find_all_type($type="") {
		return self::find_by_sql("SELECT id FROM ".self::$table_name." WHERE type = '{$type}'");
	}

	public static function recent_items($limit="10") {
		return self::find_by_sql("SELECT id FROM ".self::$table_name." WHERE validity=1 ORDER BY id DESC LIMIT {$limit}");
	}
	
	public static function inactive_items() {
		return self::find_by_sql("SELECT id FROM ".self::$table_name." WHERE validity=0 ORDER BY id DESC");
	}
	
	public static function user_inactive_items($id) {
		return self::find_by_sql("SELECT id FROM ".self::$table_name." WHERE (validity=0) AND (user_id = '{$id}') ORDER BY id DESC");
	}

	public static function find_by_id($given_id, $id=0) {
		$result_array = static::find_by_sql("SELECT * FROM ".self::$table_name." WHERE {$given_id} = {$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false ;
	}
	
	public static function find_by_userid($id=0) {
		return self::find_by_sql("SELECT id FROM ".self::$table_name." WHERE user_id = {$id}");
	}
	
	public static function best_company_item($id=0) {
		$result_array = static::find_by_sql("SELECT * FROM ".self::$table_name." WHERE user_id = {$id} ORDER BY viewed DESC LIMIT 1");
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

	public static function count_all_user($user_id) {
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