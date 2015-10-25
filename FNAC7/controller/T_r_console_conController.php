<?php

class T_r_console_conController extends Controller {

	public function index() {
		$this->render("index", T_r_console_con::findAll());
	}

	public function view() {
		try {
			$b = new T_r_console_con(parameters()["id"]);
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