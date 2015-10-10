<?php

class T_r_rayon_rayController extends Controller {

	public function index() {
		$this->render("index", T_r_rayon_rayController::findAll());
	}

	public function view() {
		try {
			
			$b = new T_r_rayon_rayController();
			$this->render("view");
		} catch (Exception $e) {
			(new SiteController())->render("index");
		    $this->render("error");
		}
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