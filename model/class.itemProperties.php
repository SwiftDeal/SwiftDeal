<?php
require_once($dir_model.'class.database.php');
/**
* Item
*/
class ItemProperties extends DatabaseObject {
	protected static $table_name = "item_properties";
	public $item_id;
	public $brand;
	public $sku_code;
	public $customer_selling_price;
	public $quantity_in_stock;
	public $dispatch_time;
	public $warranty;
	public $product_type;
	public $product_weight;
	public $mrp;
	public $highlights;
	public $created;
	public $updated;
	
	protected static $db_fields=array('item_id', 'brand', 'sku_code', 'customer_selling_price', 'quantity_in_stock', 'dispatch_time',
		'warranty', 'product_type', 'product_weight', 'mrp', 'highlights', 'created', 'updated');
		
	//datbase object class file
	public static function find_all() {
		return self::find_by_sql("SELECT id FROM ".self::$table_name." ORDER BY id DESC");
	}

	public static function find_all_type($type="") {
		return self::find_by_sql("SELECT id FROM ".self::$table_name." WHERE type = '{$type}'");
	}

	public static function recent_items($limit="10") {
		return self::find_by_sql("SELECT id FROM ".self::$table_name." WHERE validity=1 ORDER BY id DESC LIMIT {$limit}");
	}
	
	public static function find_by_id($given_id, $id=0) {
		$result_array = static::find_by_sql("SELECT * FROM ".self::$table_name." WHERE {$given_id} = {$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false ;
	}
	
	public static function find_by_userid($id=0) {
		return self::find_by_sql("SELECT id FROM ".self::$table_name." WHERE user_id = {$id}");
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