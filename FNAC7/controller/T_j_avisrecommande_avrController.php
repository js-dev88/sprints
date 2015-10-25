<?php 
class T_j_avisrecommande_avr extends Controller {

	public function index() {
		$this->render("index", T_j_avisrecommande_avr::findAll());
	}

	public function view() {
		try {
			
			$b = new T_j_avisrecommande_avr(parameters()["id"]);
			$this->render("view",$b);
		} catch (Exception $e) {
			print_r($e);
			(new SiteController())->render("index");
		    $this->render("error");
		}
	}

	public function add(){
		/*TODO*/
	}
}

