<?php

class T_j_lignecommande_lec extends Model{

	protected $_com_id;
	protected $_jeu_id;
	protected $_lec_quantite;
	
	
	public function __construct($com_id=null,$jeu_id=null) {
		
		if ($com_id == null || $jeu_id=null) {
		$st=db()->prepare("insert into t_j_lignecommande_lec (com_id,jeu_id) values ($id_cli,$id_avi)");
		$st->execute();
		}
		else {
			throw new Exception ("Interdiction de créer un objet avec des valuers nulles avi : ".$id_avi."cli : ".$id_cli);
		}
		}

	}

	
	
		public static function findAll($idcom=null) {
			$class = get_called_class();
			$table = strtolower($class);
			if($idcom==null)
			{
				$st = db()->prepare("select com_id from t_j_lignecommande_lec");
			}
			else {
				$st = db()->prepare("select com_id from t_j_lignecommande_lec where com_id = :id");
					$st->bindValue(":id", $idcom);
			}
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_j_lignecommande_lec($row["com_id"],$row["jeu_id"]);
			}
			return $list;
		}
	

	



}



