<?php


class T_e_video_vidController extends Controller {

	public function index() {
		$this->render("index", T_e_video_vid::findAll());
	}

	public function view() {
		try {
			
			$b = new T_e_video_vid(parameters()["id"]);
			$this->render("view",$b);
		} catch (Exception $e) {
			print_r($e);
			(new SiteController())->render("index");
		    $this->render("error");
		}
	}

	public function add(){
		if(isset($_POST['vid_url'])&&isset($_POST['jeu_id'])){
			if(empty($_POST['jeu_id'])){
				echo "3";
			}
			if(empty($_POST['vid_url'])){
				echo "2";
			}else{
				if(!filter_var($_POST['vid_url'], FILTER_VALIDATE_URL)){
					echo "5";
				}else{
					$verif = 0;
					foreach(T_e_video_vid::findAll() as $t_e_video_vid){
						if($t_e_video_vid->vid_url == $_POST['vid_url'] && $t_e_video_vid->jeu_id == $_POST['jeu_id'] ){
							echo "4";
							$verif = 1;
						}
					}
					if($verif == 0){
						
						$newvideo = new T_e_video_vid();
						$newvideo->jeu_id = parameters()["jeu_id"];
						$newvideo->vid_url= parameters()["vid_url"];

						echo "1";
						
						
					}
				}
			}
		}else{
			echo "3";
		}
	}
}

