<?php

class T_e_commande_com extends Model {

	protected $_com_id;
	protected $_rel_id;
	protected $_adr_id;
	protected $_cli_id;
	protected $_com_date;
	
	public function __construct($id=null) {
		$class = get_class($this);
		$table = strtolower($class);
		if ($id == null) {
			$st = db()->prepare("insert into t_e_commande_com default values returning com_id");
			$st->execute();
			$row = $st->fetch();
			$field = "com_id";
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from t_e_commande_com where com_id=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: ".$table." id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				$this->_com_id = $id;
				$this->_rel_id = $row["rel_id"];
				$this->_adr_id = $row["adr_id"];
				$this->_cli_id = $row["cli_id"];
				$this->_com_date = $row["com_date"];
			}
			
		}

	}

	public static function findAll() {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select com_id from t_e_commande_com");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new T_e_commande_com($row["com_id"]);
		}
		return $list;
	}
	


	public function __get($fieldName) {
		$varName = "_".$fieldName;
		if (property_exists(get_class($this), $varName))
			return $this->$varName;
		else
			throw new Exception("Unknown variable: ".$fieldName);
	}

/*
	public function __set($fieldName, $value) {
		$varName = "_".$fieldName;
		if ($value != null) {
			if (property_exists(get_class($this), $varName)) {
				$this->$varName = $value;
				$class = get_class($this);
				$table = strtolower($class);
				$id = "_id".$fieldName;
				if (isset($value->$id)) {
					$st = db()->prepare("update $table set id$fieldName=:val where id$table=:id");
					$id = substr($id, 1);
					$st->bindValue(":val", $value->$id);
				} else {
					$st = db()->prepare("update $table set $fieldName=:val where id$table=:id");
					$st->bindValue(":val", $value);
				}
				$id = "id".$table;
				$st->bindValue(":id", $this->$id);
				$st->execute();
			} else
				throw new Exception("Unknown variable: ".$fieldName);
		}
	}

	// à surcharger
	public function __toString() {
		return get_class($this).": ".$this->name;
	}*/

}