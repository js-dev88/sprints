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

	public function add(){
		
		if(isset($_POST['pho_url'])&&isset($_POST['jeu_id'])){
			if(empty($_POST['jeu_id'])){
				echo "3";
			}
			if(empty($_POST['pho_url'])){
				echo "2";
			}else{
				if(!filter_var($_POST['pho_url'], FILTER_VALIDATE_URL)){
					echo "5";
				}else{
					$verif = 0;
					foreach(T_e_photo_pho::findAll() as $t_e_photo_pho){
						if($t_e_photo_pho->pho_url == $_POST['pho_url'] && $t_e_photo_pho->jeu_id == $_POST['jeu_id'] ){
							echo "4";
							$verif = 1;
						}
					}
					if($verif == 0){
						
						$newphoto = new T_e_photo_pho();
						$newphoto->jeu_id = parameters()["jeu_id"];
						$newphoto->pho_url= parameters()["pho_url"];

						echo "1";
						
						
					}
				}
			}
		}else{
			echo "3";
		}
	}
}