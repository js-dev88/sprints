<?php

class T_e_client_cliController extends Controller {

	public function index() {
		$this->render("index", T_e_client_cli::findAll());
	}

	public function view() {
		try {
			$client=unserialize($_SESSION['client']);
            $id = $client->cli_id;
			$b = new T_e_client_cli($id);
			$this->render("view",$b);
		} catch (Exception $e) {
			(new SiteController())->render("index");
		    $this->render("error");
		}
	}
	public function error() {
    		$this->render("error");
  	}

	/*public function add () {
		if(isset(parameters()["cli_mel"]))
		 {
		// 	$client = new T_e_client_cli();
		// 	$client->cli_mel=parameters()["cli_mel"];
		// 	$client->cli_motpasse=md5(parameters()["cli_motpasse"]);
		// 	$client->cli_pseudo=parameters()["cli_pseudo"];
		// 	$client->cli_civilite=parameters()["cli_civilite"];
		// 	$client->cli_nom=parameters()["cli_nom"];
		// 	$client->cli_prenom=parameters()["cli_prenom"];
		// 	$client->cli_telfixe=parameters()["cli_telfixe"];
		// 	$client->cli_nom=parameters()["cli_nom"];
		// 	$client->cli_telportable=parameters()["cli_telportable"];
			$this->render("add");


		}else {
			$this->render("add");

		}


	}*/

	public function formconnectaction(){
			
		//$error;

		

		if(isset($_POST['connectionEmail']) && isset($_POST['connectionMdp'])){

			if (empty($_POST['connectionEmail'])){
					echo "4";
		    }else if((filter_var($_POST['connectionEmail'], FILTER_VALIDATE_EMAIL)) == FALSE) {    

		    		echo "0";

        							
        	}else if (empty($_POST['connectionMdp'])){
        			echo "2";
        	}else{
        		$verifmail = 0;
        		foreach(T_e_client_cli::findAll() as $t_e_client_cli) {

					if($t_e_client_cli->cli_mel == $_POST['connectionEmail']){
						$verifmail=1;

						if(($t_e_client_cli->cli_motpasse) == $_POST['connectionMdp']){							
							echo "1"; 
							$client = new T_e_client_cli($t_e_client_cli->cli_id);	
							$_SESSION['client'] = serialize($client);
						}else{
							echo "5";							
						}
					}
        		}

        		if($verifmail == 0){
				echo"6";
				}
        	}		
		}else{
			echo "3";
		}

	}
	



}