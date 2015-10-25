<?php
class T_j_avisrecommande_avr extends Model {

	protected $_avi_id;
	protected $_cli_id;

	public function __construct($id_avi=null,$id_cli=null) {
		
		if($id_avi!=null && $id_cli!=null)
		{
		$st=db()->prepare("insert into t_j_avisrecommande_avr (cli_id,avi_id) values ($id_cli,$id_avi)");
		$st->execute();
		}
		else {
			throw new Exception ("Interdiction de créer un objet avec des valuers nulles avi : ".$id_avi."cli : ".$id_cli);
		}


	// if ($id_cli == null || $id_avi=null) {
	// 	$st = db()->prepare("insert into t_j_avisrecommande_avr (cli_id,avi_id) values (1,1)");
	// 	$st->execute();
	// 	$row = $st->fetch();
	// 	$field = "avi_id";
	// 	$this->$field = $row[$field];
	// } else {
	// 	$st = db()->prepare("select * from t_j_avisrecommande_avr where avi_id=:id_avi and cli_id:=id_cli");
	// 	$st->bindValue(":id_cli", $id_cli);
	// 	$st->bindValue(":id_avi", $id_avi);
	// 	$st->execute();
	// 	if ($st->rowCount() != 1) {
	// 		throw new Exception("Not in table: T_j_avisrecommande_avr id: ".$id );
	// 	} else {
	// 		$row = $st->fetch(PDO::FETCH_ASSOC);
	// 		$this->_avi_id = $id_avi;
	// 		$this->_cli_id = $id_cli;
			
	// 		}
	// 	}
	}

	public static function findAll($id_avi=null,$id_cli=null) {
			$class = get_called_class();
			$table = strtolower($class);
			if($id_avi==null || $id_cli=null)
			{
				$st = db()->prepare("select * from t_j_avisrecommande_avr");
			}
			else {
				$st = db()->prepare("select * from t_j_avisrecommande_avr where avi_id = :id_avi and cli_id:=id_cli");
				$st->bindValue(":id_cli", $id_cli);
				$st->bindValue(":id_avi", $id_avi);
			}
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_j_avisrecommande_avr($row["avi_id"],$row["cli_id"]);
			}
			return $list;
		}

	public static function countAvisr($id_avi=null) {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select count(*) from t_j_avisrecommande_avr where avi_id=$id_avi");
		// $st->bindValue(":id_avi", $id_avi);
		$st->execute();
		return $st->fetchColumn();
	}

}