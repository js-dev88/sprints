<?php

class T_e_video_vid extends Model {

	protected $_vid_id;
	protected $_jeu_id;
	protected $_vid_url;
	

	public function __construct($id=null) {
		
		if ($id == null) {
			$st = db()->prepare("insert into t_e_video_vid (jeu_id,vid_url) values ('1','vide') returning vid_id");
			$st->execute();
			$row = $st->fetch();
			$field = "vid_id";
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from t_e_video_vid where vid_id=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: T_e_video_vid  id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				$this->_vid_id = $id;
				$this->_jeu_id = $row["jeu_id"];
				$this->_vid_url = $row["vid_url"];
			}
		}
    }


	public static function findAll() {
			$class = get_called_class();
			$table = strtolower($class);
			$st = db()->prepare("select vid_id from t_e_video_vid");
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_e_video_vid($row["vid_id"]);
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
					
					$st = db()->prepare("update t_e_video_vid set id$fieldName=:val where vid_id=:id");
					
					$st->bindValue(":val", $value->$id);
	
				} else {
					$st = db()->prepare("update t_e_video_vid set $fieldName=:val where vid_id=:id");
					$st->bindValue(":val", $value);
				}
				$id = "vid_id";
				$st->bindValue(":id",$this->$id);
				$st->execute();
			} else
				throw new Exception("Unknown variable: ".$fieldName);
		}
	}
		

}