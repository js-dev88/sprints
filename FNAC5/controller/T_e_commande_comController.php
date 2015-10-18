<?php

class T_e_commande_comController extends Controller {
	
	public function index() {
	

		$this->render("index",T_e_commande_com::findAll());
	}

	public function view() {
	try {
			
			$b = new T_e_commande_com(parameters()["id"]);
			$this->render("view",$b);
		} catch (Exception $e) {
			
			//(new SiteController())->render("index");
		   // $this->render("error");
		}
	}
	public function error() {
    		$this->render("error");
  	}
	public function getAllCommande(){
		$client=unserialize($_SESSION['client']);
		$st = db()->prepare("select * from t_e_commande_com where cli_id=:id");
		$st->bindValue(":id", $client);
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new T_e_commande_com($this->_com_id = $row["com_id"]);
			}
		return $list;
	}

	
	
  	public function logout(){
		session_destroy();
		header('Location: ?r=site/index');
	}
	 	

  	
  	

}