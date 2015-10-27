<?php

class T_e_commande_com extends Model {

	protected $_com_id;
	protected $_rel_id;
	protected $_adr_id;
	protected $_cli_id;
	protected $_com_date;
	protected $_jeu_id;
	protected $_lec_quantite;
	
	public function __construct($id=null, $id_jeu=null) {
		
		if ($id == null ) {
			$st = db()->prepare("insert into t_e_commande_com default values returning com_id");
			$st->execute();
			$row = $st->fetch();
			$field = "com_id";
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from t_j_lignecommande_lec lc
							join t_e_commande_com com on com.com_id=lc.com_id
							where com.cli_id=:id and lc.jeu_id =:id_jeu and com.com_id=
							(select max(com_id) from t_e_commande_com)");
			$st->bindValue(":id", $id);
			$st->bindValue(":id_jeu", $id_jeu);
			$st->execute();
			
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: ".var_dump($id)." id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				$this->_com_id = $id;
				$this->_rel_id = $row["rel_id"];
				$this->_adr_id = $row["adr_id"];
				$this->_cli_id = $row["cli_id"];
				$this->_com_date = $row["com_date"];
				$this->_jeu_id = $row["jeu_id"];
				$this->_lec_quantite = $row["lec_quantite"];

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
	
	public static function findPanier($idclient){
		$st = db()->prepare("select lc.jeu_id from t_j_lignecommande_lec lc
							join t_e_commande_com com on com.com_id=lc.com_id
							where com.cli_id=:id and com.com_id=
							(select max(com_id) from t_e_commande_com)");
		$st->bindValue(":id", $idclient);
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new T_e_commande_com($idclient,$row["jeu_id"]);
			}
		if(count($list)==0){
			
		}
		return $list;
	}

	public static function findIdPanier($idclient){

		$st = db()->prepare("select max(com_id) from t_e_commande_com where cli_id=:id");
		$st->bindValue(":id", $idclient);
		$st->execute();
		if($st->rowCount() == 1){
			$tab = $st->fetch(PDO::FETCH_ASSOC);
			$idpanier = $tab['max'];
			return $idpanier;
		}else
			throw new Exception("Erreur récupération idpanier");
			
		
	}

	public static function insertLigneCommande($com_id,$jeu_id,$lec_quantite) {	
		if ($com_id != null && $jeu_id !=null && $lec_quantite != null) {
			try{
				$st=db()->prepare("insert into t_j_lignecommande_lec (com_id,jeu_id,lec_quantite) values (".$com_id.",".$jeu_id.",".$lec_quantite.")");
				$st->execute();
			}catch(Exception $e){
				throw new Exception("Erreur insertion base de données");	
			}
		}else{
			throw new Exception ("Interdiction de créer un objet avec des valuers nulles");
		}
	}

	public static function supprimeLigneCommande($com_id,$jeu_id){
		if ($com_id != null && $jeu_id !=null) {
			try{
				$st=db()->prepare("delete from t_j_lignecommande_lec where com_id=".$com_id." and jeu_id=".$jeu_id."");
				$st->execute();
			}catch(Exception $e){
				throw new Exception("Erreur suppression base de données");	
			}
		}else{
			throw new Exception ("Interdiction de créer un objet avec des valuers nulles");
		}
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