<?php



class T_r_rayon_ray extends Model {

	protected $_ray_id;
	protected $_ray_nom;

	

	public function __construct($id=null) {
		
		if ($id == null) {
			$st = db()->prepare("insert into t_r_rayon_ray default values returning ray_id");
			$st->execute();
			$row = $st->fetch();
			$field = "ray_id";
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from t_r_rayon_ray where ray_id=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: t_r_rayon_ray id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				$this->_ray_id = $id;
				$this->_ray_nom = $row["ray_nom"];

			}
		}
    }
	/*public static function retourne() {
			$this->render("T_e_jeuvideo_jeuController");
	}*/
		public static function findAll() {
			$class = get_called_class();
			$table = strtolower($class);
			$st = db()->prepare("select * from t_r_rayon_ray");
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_r_rayon_ray($row["ray_id"]);
			}
			return $list;
		}

		

}