<?php

class T_j_lignecommande_lecController extends Controller {

	public function index() {
		$this->render("index", T_j_lignecommande_lecController::findAll());
	}

	public function view() {
		try {
			
			$b = new T_j_lignecommande_lecController();
			$this->render("view");
		} catch (Exception $e) {
			(new SiteController())->render("index");
		    $this->render("error");
		}
	}
	public function add(){
		$lignecommande= new T_j_lignecommande_lec();
		
		
	}
	
	public function ajoutpanier(){
		$client=unserialize($_SESSION['client']);
		$st = db()->prepare("select jeu_nom, lec_quantite from t_j_lignecommande_lec lc
							join t_e_commande_com com on com.com_id=lc.com_id
							join t_e_client_cli cli on cli.cli_id=com.cli_id
							join t_e_jeuvideo_jeu jeu on jeu.jeu_id=lc.jeu_id
							where com.cli_id=:id and com.com_id=max(com_id)");
		$st->bindValue(":id", $client);
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new T_e_commande_com($this->_com_id = $row["com_id"]);
			}
		return $list;
	}
	
	public static function recupval($id){
		 $jeuid=$id;
	}
	
	
	public function error() {
    		$this->render("error");
  	}
	public function logout(){
		session_destroy();
		header('Location: ?r=site/index');
	}
 }