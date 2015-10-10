<?php


class T_e_photo_phoController extends Controller {

	public function index() {
		$this->render("index", T_e_photo_pho::findAll());
	}

	public function view() {
		try {
			
			$b = new T_e_photo_pho(parameters()["id"]);
			$this->render("view",$b);
		} catch (Exception $e) {
			print_r($e);
			(new SiteController())->render("index");
		    $this->render("error");
		}
	}
}