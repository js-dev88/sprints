<?php



class T_e_client_cli extends Model {

	protected $_cli_id;
	protected $_cli_mel;
	protected $_cli_motpasse;
	protected $_cli_pseudo;
	protected $_cli_civilite;
	protected $_cli_nom;
	protected $_cli_prenom;
	protected $_cli_telfixe;
	protected $_cli_telportable;

	public function __construct($id=null) {
		
		

		//throw new Exception("Not in table: ".$table." classe: ".$class." suffixe".$suffixeid );
		if ($id == null) {
			$st = db()->prepare("insert into t_e_client_cli default values returning cli_id");
			$st->execute();
			$row = $st->fetch();
			$field = "cli_id";
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from t_e_client_cli where cli_id=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: T_e_client_cli id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				$this->_cli_id = $id;
				$this->_cli_mel = $row["cli_mel"];
				$this->_cli_motpasse = $row["cli_motpasse"];
				$this->_cli_pseudo = $row["cli_pseudo"];
				$this->_cli_civilite = $row["cli_civilite"];
				$this->_cli_nom = $row["cli_nom"];
				$this->_cli_prenom = $row["cli_prenom"];
				$this->_cli_telfixe = $row["cli_telfixe"];
				$this->_cli_telportable = $row["cli_telportable"];
			}
		}
    }


		public static function findAll() {
			$class = get_called_class();
			$table = strtolower($class);
			$st = db()->prepare("select cli_id from t_e_client_cli");
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_e_client_cli($row["cli_id"]);
			}
			return $list;
		}

		

}