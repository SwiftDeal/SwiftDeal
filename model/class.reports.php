<?php
require_once($dir_model.'class.database.php');

/**
* Report
*/
class Report extends DatabaseObject
{
	protected static $table_name = "report";
	public $id;
	public $name;
	public $email;
	public $city;
	public $item_id;
	public $message;
	public $created;
	public $response;
	public $replied;

	protected static $db_fields = array('id', 'name', 'email', 'city', 'item_id', 'message', 
				'created', 'response', 'replied');
	
	public static function make($post_id, $user_id="", $name="", $content="") {
		if (!empty($post_id) && !empty($content)) {
			$comment = new Comment();
			$comment->post_id 		= (int)$post_id;
			$comment->created 		= strftime("%Y-%m-%d %H:%M:%S", time()+1800);
			$comment->user_id 		= $user_id;
			$comment->name 			= $name;
			$comment->content 		= $content;
			return $comment;
		} else {
			return false;
		}
	}

	public static function make_item($item_id, $user_id="", $name="", $content="") {
		if (!empty($item_id) && !empty($content)) {
			$comment = new Comment();
			$comment->item_id 		= (int)$item_id;
			$comment->created 		= strftime("%Y-%m-%d %H:%M:%S", time()+19800);
			$comment->user_id 		= $user_id;
			$comment->name	 		= $name;
			$comment->content 		= $content;
			return $comment;
		} else {
			return false;
		}
	}

	public static function find_messages_on($type="", $id=0) {
		global $database;
		$sql  = "SELECT * FROM ". self::$table_name;
		$sql .= " WHERE {$type}=".$database->escape_value($id);
		$sql .= " ORDER BY created DESC";
		return self::find_by_sql($sql);
	}

	public function send_notification() {
		$msg = $this->message; 
		$item_id = $this->item_id;
		$to = $this->email;
		$subject = "Your Report on SwiftDeal.In";
		$from = "Swiftdeal.in <info@swiftdeal.in>";
		log_action("report ", "item_id = ".$item_id." , Message : ".$msg);

		$message 	=<<<EMAILBODY
Your report has been successfully submitted.

Report : {$msg}

By : {$name} at {$created}

Thanks and Regards,
SwiftDeal.In Team

EMAILBODY;

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

	public static function find_by_id($id=0) {
		$result_array = static::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id = {$id} LIMIT 1");
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
		foreach ($attribute_pairs as $key => $value) {
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