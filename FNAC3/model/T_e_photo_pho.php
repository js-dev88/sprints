<?php

class T_e_photo_pho extends Model {

	protected $_pho_id;
	protected $_jeu_id;
	protected $_pho_url;
	

	public function __construct($id=null) {
		
		if ($id == null) {
			$st = db()->prepare("insert into t_e_photo_pho default values returning pho_id");
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


		public static function findAll() {
			$class = get_called_class();
			$table = strtolower($class);
			$st = db()->prepare("select pho_id from t_e_photo_pho");
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_e_photo_pho($row["pho_id"]);
			}
			return $list;
		}

		

}