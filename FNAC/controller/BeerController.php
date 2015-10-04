<?php

class BeerController extends Controller {


	public function index() {
		$this->render("index", Beer::findAll());
	}

	public function view() {
		try {
			$b = new Beer(parameters()["id"]);
			$this->render("view", $b);
		} catch (Exception $e) {
			(new SiteController())->render("index");
			// $this->render("error");
		}
	}



}


