<?php

class SiteController extends Controller {

	public function __construct()  {

	}

	

	public function index() {
		$this->render("index");
	}

	public function error404(){
		$this->render("error404");
	}




}


