<?php

class T_r_editeur_ediController extends Controller {

	public function index() {
		$this->render("index", T_r_editeur_edi::findAll());
	}

	public function view() {
		try {
			$b = new T_r_editeur_edi(parameters()["id"]);
			$this->render("view");
		} catch (Exception $e) {
			(new SiteController())->render("index");
		    $this->render("error");
		}
	}
	public function error() {
    		$this->render("error");
  	}

}