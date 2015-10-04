<?php

class T_e_client_cliController extends Controller {

	public function index() {
		$this->render("index", T_e_client_cli::findAll());
	}

	public function view() {
		try {
			$b = new T_e_client_cli(parameters()["id"]);
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