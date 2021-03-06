<?php

class T_e_jeuvideo_jeuController extends Controller {

	public function index() {
		$this->render("index", T_e_jeuvideo_jeu::findAll());
	}

	public function view() {
		try {
			
			$b = new T_e_jeuvideo_jeu(parameters()["id"]);
			$this->render("view",$b);
		} catch (Exception $e) {
			print_r($e);
			(new SiteController())->render("index");
		    $this->render("error");
		}
	}
	

	public function search() {
			//quelque soit le mot il est mis en minuscule 
			$motclef= strtolower($_POST["mot_clef"]);
			$srchConsole=$_POST["choiceconsole"];
			$srchRayon=$_POST["choicerayon"];
			$class = get_called_class();
			$table = strtolower($class);
			if($srchConsole == "console")
			{
				if($srchRayon == "rayon"){
					$st = db()->prepare("select * from t_e_jeuvideo_jeu j where lower(jeu_nom) like '%".$motclef."%'"); 
				}else{
					$st = db()->prepare("select * from t_e_jeuvideo_jeu j join t_r_console_con c on c.con_id = j.con_id join t_j_jeurayon_jer v on v.jeu_id = j.jeu_id join t_r_rayon_ray r on r.ray_id=v.ray_id where jeu_nom like '%".$motclef."%' and  ray_nom like '%".$srchRayon."%'");
				}
			}else{
				if($srchRayon == "rayon"){
					$st = db()->prepare("select * from t_e_jeuvideo_jeu j join t_r_console_con c on c.con_id = j.con_id where lower(jeu_nom) like '%".$motclef."%' and con_nom like '%".$srchConsole."%'");  
				}else{
					$st = db()->prepare("select * from t_e_jeuvideo_jeu j join t_r_console_con c on c.con_id = j.con_id join t_j_jeurayon_jer v on v.jeu_id = j.jeu_id join t_r_rayon_ray r on r.ray_id=v.ray_id where jeu_nom like '%".$motclef."%' and  ray_nom like '%".$srchRayon."%' and con_nom like '%".$srchConsole."%'");
				}
			}
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_e_jeuvideo_jeu($this->_jeu_id = $row["jeu_id"]);
			}
			$this->render("search",$list);
			
	}
	public function error() {
    		$this->render("error");
  	}
	public function logout(){
		session_destroy();
		header('Location: ?r=site/index');
	}
 }