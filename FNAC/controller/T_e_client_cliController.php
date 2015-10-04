<?php

class T_e_client_cliController extends Controller {


	public function index() {
		$this->render("index", T_e_client_cli::findAll());
	}

	public function view() {
		try {
			$b = new T_e_client_cli(parameters()["cli_id"]);
			$this->render("view", $b);
		} catch (Exception $e) {
			//(new SiteController())->render("index");
			 $this->render("error");
		}
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




		
		
			$this->render("plus"); }
		
		
		/*throw new Exception("mot de passe erroné" );

		if(isset($_POST['connectionEmail']) && isset($_POST['connectionMdp'])){
			
			
			$verifmail = 0;
			foreach(T_e_client_cli::findAll() as $t_e_client_cli) {
			
				if($t_e_client_cli->cli_mel == $_POST['connectionEmail'])
				{
					$verifmail=1;
					if(($t_e_client_cli->cli_motpasse) == $_POST['connectionMdp']){
							 echo "Success";   
							throw new Exception("connexion reussie" );
					}else{

						echo "Failed";
						throw new Exception("mot de passe erroné" );
					}

				}
			}
			if($verifmail != 0){
				echo "Failed";
				throw new Exception("adresse mail erronée" );
			}
		}else{
			$this->render("error");
		}

	}
	public function plus(){
		$this->render("plus");
	}*/


}

