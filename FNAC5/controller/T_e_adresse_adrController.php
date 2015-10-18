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
	 	

  	
  	

}