<?php

class T_e_photo_pho extends Model {

	protected $_pho_id;
	protected $_jeu_id;
	protected $_pho_url;
	

	public function __construct($id=null) {
		
		if ($id == null) {
			$st = db()->prepare("insert into t_e_photo_pho (jeu_id,pho_url) values ('1','vide') returning pho_id");
			$st->execute();
			$row = $st->fetch();
			$field = "pho_id";
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from t_e_photo_pho where pho_id=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: T_e_photo_pho id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				$this->_pho_id = $id;
				$this->_jeu_id = $row["jeu_id"];
				$this->_pho_url = $row["pho_url"];
			}
		}
    }


	public static function findAll($id=null) {

			
				$class = get_called_class();
				$table = strtolower($class);
				if ($id == null) {
					$st = db()->prepare("select pho_id from t_e_photo_pho");
				}else{
					$st = db()->prepare("select pho_id from t_e_photo_pho where jeu_id = :id");
					$st->bindValue(":id", $id);
				}
				$st->execute();
				$list = array();
				while($row = $st->fetch(PDO::FETCH_ASSOC)) {
					$list[] = new T_e_photo_pho($row["pho_id"]);
				}
				return $list;
	}		

	public function __set($fieldName, $value) {
		$varName = "_".$fieldName;
		
		if ($value != null) {
			if (property_exists(get_class($this), $varName)) {
				$this->$varName = $value;
				$class = get_class($this);
				$table = strtolower($class);
				$id = $fieldName;				
				if (isset($value->$id)) {
					
					$st = db()->prepare("update t_e_photo_pho set id$fieldName=:val where pho_id=:id");
					
					$st->bindValue(":val", $value->$id);
	
				} else {
					$st = db()->prepare("update t_e_photo_pho set $fieldName=:val where pho_id=:id");
					$st->bindValue(":val", $value);
				}
				$id = "pho_id";
				$st->bindValue(":id",$this->$id);
				$st->execute();
			} else
				throw new Exception("Unknown variable: ".$fieldName);
		}
	}


}