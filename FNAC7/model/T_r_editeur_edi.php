<?php

class T_r_editeur_edi extends Model {

	protected $_edi_id;
	protected $_edi_nom;
	

	public function __construct($id=null) {
		
		if ($id == null) {
			$st = db()->prepare("insert into t_r_editeur_edi default values returning edi_id");
			$st->execute();
			$row = $st->fetch();
			$field = "edi_id";
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from t_r_editeur_edi where edi_id=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: T_r_editeur_edi id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				$this->_edi_id = $id;
				$this->_edi_nom = $row["edi_nom"];
			}
		}
    }


		public static function findAll() {
			$class = get_called_class();
			$table = strtolower($class);
			$st = db()->prepare("select edi_id from t_r_editeur_edi");
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_r_editeur_edi($row["edi_id"]);
			}
			return $list;
		}

		

}