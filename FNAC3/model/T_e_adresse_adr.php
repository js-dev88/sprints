<?php

class T_e_adresse_adr extends Model {

	protected $_adr_id;
	protected $_cli_id;
	protected $_adr_nom;
	protected $_adr_type;
	protected $_adr_rue;
	protected $_adr_complementrue;
	protected $_adr_cp;
	protected $_adr_ville;
	protected $_pay_id;
	protected $_adr_latitude;
	protected $_adr_longitude;
	

	public function __construct($id=null) {
		
		if ($id == null) {
			$st = db()->prepare("insert into T_e_adresse_adr default values returning adr_id");
			$st->execute();
			$row = $st->fetch();
			$field = "adr_id";
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from T_e_adresse_adr where adr_id=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: T_e_adresse_adr id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				$this->_adr_id = $id;
				$this->_cli_id = $row["cli_id"];
				$this->_adr_nom = $row["adr_nom"];
				$this->_adr_type = $row["adr_type"];
				$this->_adr_rue = $row["adr_rue"];
				$this->_adr_complementrue = $row["adr_complementrue"];
				$this->_adr_cp = $row["adr_cp"];
				$this->_adr_ville = $row["adr_ville"];
				$this->_adr_latitude = $row["adr_latitude"];
				$this->_adr_longitude = $row["adr_longitude"];
			}
		}
    }


		public static function findAll() {
			$class = get_called_class();
			$table = strtolower($class);
			$st = db()->prepare("select adr_id from T_e_adresse_adr");
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_e_adresse_adr($row["adr_id"]);
			}
			return $list;
		}

		

}