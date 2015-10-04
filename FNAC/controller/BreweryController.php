<?php

class BreweryController extends Controller {


	public function index() {
		$this->render("index", Brewery::findAll());
	}

	public function view() {
		$brewery = new Brewery(parameters()["id"]);
		$this->render("view", $brewery);
	}




}


