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
	
	
	
	public function error() {
    		$this->render("error");
  	}
	public function logout(){
		session_destroy();
		header('Location: ?r=site/index');
	}
 }