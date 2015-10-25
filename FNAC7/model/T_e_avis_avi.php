<?php
class T_e_avis_avi extends Model {

	protected $_avi_id;
	protected $_cli_id;
	protected $_jeu_id;
	protected $_avi_date;
	protected $_avi_titre;
	protected $_avi_detail;
	protected $_avi_note;

	public function __construct($id=null) {
	
	if ($id == null) {
		$st = db()->prepare("insert into T_e_avis_avi default values returning avi_id");
		$st->execute();
		$row = $st->fetch();
		$field = "avi_id";
		$this->$field = $row[$field];
	} else {
		$st = db()->prepare("select * from T_e_avis_avi where avi_id=:id");
		$st->bindValue(":id", $id);
		$st->execute();
		if ($st->rowCount() != 1) {
			throw new Exception("Not in table: T_e_avis_avi id: ".$id );
		} else {
			$row = $st->fetch(PDO::FETCH_ASSOC);
			$this->_avi_id = $id;
			$this->_jeu_id = $row["jeu_id"];
			$this->_cli_id = $row['cli_id'];
			$this->_avi_date = $row["avi_date"];
			$this->_avi_titre = $row["avi_titre"];
			$this->_avi_note = $row["avi_note"];
			$this->_avi_detail = $row["avi_detail"];

			}
		}
	}

	public static function findAll($id=null) {
			$class = get_called_class();
			$table = strtolower($class);
			if($id==null)
			{
				$st = db()->prepare("select avi_id from t_e_avis_avi");
			}
			else {
				$st = db()->prepare("select avi_id from t_e_avis_avi where jeu_id = :id");
					$st->bindValue(":id", $id);
			}
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_e_avis_avi($row["avi_id"]);
			}
			return $list;
		}

}