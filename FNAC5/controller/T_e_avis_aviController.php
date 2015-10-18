<?php 
class T_e_avis_avi extends Controller {

	public function index() {
		$this->render("index", T_e_avis_avi::findAll());
	}

	public function view() {
		try {
			
			$b = new T_e_avis_avi(parameters()["id"]);
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

