<?php



class T_r_console_con extends Model {

	protected $_con_id;
	protected $_con_nom;
	

	public function __construct($id=null) {
		
		if ($id == null) {
			$st = db()->prepare("insert into t_r_console_con default values returning con_id");
			$st->execute();
			$row = $st->fetch();
			$field = "con_id";
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from t_r_console_con where con_id=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: T_r_console_con id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				$this->_con_id = $id;
				$this->_con_nom = $row["con_nom"];
			}
		}
    }


		public static function findAll() {
			$class = get_called_class();
			$table = strtolower($class);
			$st = db()->prepare("select con_id from t_r_console_con");
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_r_console_con($row["con_id"]);
			}
			return $list;
		}

		

}