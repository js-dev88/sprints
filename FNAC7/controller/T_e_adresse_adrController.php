<?php

class T_e_adresse_adrController extends Controller {

	public function index() {
	
		$this->render("index", T_e_adresse_adr::findAll());
	}

	public function view() {
		try {
			$b = new T_e_adresse_adr(parameters()["adr_id"]);
			$this->render("view");
		} catch (Exception $e) {
			(new SiteController())->render("index");
		    $this->render("error");
		}
	}
	public function error() {
    		$this->render("error");
  	}

  	public function displayAdresseFac(){
	 	$this->render("index",T_e_client_cli::findAll());
	 }
	 	
	public function getAllAdresse(){
		$client=unserialize($_SESSION['client']);
		
		$st = db()->prepare("select * from t_e_adresse_adr where cli_id=:id");
		$st->bindValue(":id", $client);
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new T_e_adresse_adr($this->_adr_id = $row["adr_id"]);
			}
		return $list;
	}
	
  	
  	

}