<?php

class T_e_jeuvideo_jeu extends Model {

	protected $_jeu_id;
	protected $_edi_id;
	protected $_con_id;
	protected $_jeu_nom;
	protected $_jeu_description;
	protected $_jeu_dateparution;
	protected $_jeu_prixttc;
	protected $_jeu_codebarre;
	protected $_jeu_stock;
	
	public function __construct($id=null) {
		
		if ($id == null) {
			$st = db()->prepare("insert into t_e_jeuvideo_jeu default values returning jeu_id");
			$st->execute();
			$row = $st->fetch();
			$field = "jeu_id";
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from t_e_jeuvideo_jeu where jeu_id=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: t_e_jeuvideo_jeu id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				$this->_jeu_id = $id;
				$this->_edi_id = $row["edi_id"];
				$this->_con_id = $row["con_id"];
				$this->_jeu_nom = $row["jeu_nom"];
				$this->_jeu_description = $row["jeu_description"];
				$this->_jeu_dateparution = $row["jeu_dateparution"];
				$this->_jeu_prixttc = $row["jeu_prixttc"];
				$this->_jeu_codebarre = $row["jeu_codebarre"];
				$this->_jeu_stock = $row["jeu_stock"];
			}
		}
    }


		public static function findAll() {
			$class = get_called_class();
			$table = strtolower($class);
			$st = db()->prepare("select * from t_e_jeuvideo_jeu");
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_e_jeuvideo_jeu($row["jeu_id"]);
			}
			return $list;
		}
}