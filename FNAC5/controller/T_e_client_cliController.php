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
			
			 if(isset($_POST['pseudo_update']) 
			 	&& isset($_POST["nom_update"]) 
			 	&& isset($_POST["prenom_update"])
			 	&& isset($_POST["mail_update"])
			 	&& isset($_POST['telfixe_update'])
			 	&& isset($_POST['telpor_update'])
			 	/*&& !empty($_POST['pseudo_update'])
			 	&& !empty($_POST['nom_update'])
			 	&& !empty($_POST['prenom_update'])
			 	&& !empty($_POST['mail_update'])
			 	&& !empty($_POST['telfixe_update'])
			 	&& !empty($_POST['telpor_update'])*/
			 	 ){
			 	
			    if(isset($_POST['mdp_update'])
				&& isset($_POST['mdp_confirm_update'])
				&& !empty($_POST['mdp_update'])
				&& !empty($_POST['mdp_confirm_update']))
				{
					if($_POST['mdp_update'] == $_POST['mdp_confirm_update'])
					{
						$mdp=md5($_POST['mdp_update']);
						$b->cli_motpasse=$mdp;
					}else{
						$msgerror="Format tel portable pas bon";
						$data[]=$msgerror;
					}

				}
			
			// $patterntelport = '/^0[67][0-9]{8}$/';
			// if(!preg_match($patterntelport,$_POST['telpor_update']))
			// {
			// 	$msgerror="Format tel portable pas bon";
			// 	$data[]=$msgerror;
			// }
			
			$b->cli_pseudo=$_POST['pseudo_update'];
			$b->cli_nom=$_POST["nom_update"];
			$b->cli_prenom=$_POST["prenom_update"];
			$b->cli_mel=$_POST["mail_update"];
			$b->cli_telportable=$_POST['telpor_update'];
			$b->cli_telfixe=$_POST['telfixe_update'];
			$client->cli_pseudo=$_POST['pseudo_update'];
			$client->cli_nom=$_POST['nom_update'];
			$client->cli_prenom=$_POST['prenom_update'];
			$client->cli_mel=$_POST['mail_update'];
			$client->cli_telportable=$_POST['telpor_update'];
			$client->cli_telfixe=$_POST['telfixe_update'];
			$_SESSION['client']=serialize($client);
			}
            if(!empty($data))
            {
				$data[0]=$b;
				$this->render("view",$data);
			}
			else
			{
			$data[0]=$b;
			$data[99]="coucou";
			$this->render("view",$data); 
			}
		} catch (Exception $e) {
			(new SiteController())->render("index");
		    $this->render("error");
		}
	}

	public function error() {
    		$this->render("error");
  	}

	public function add () {
		//verifications formulaire inscription
			$data = array();

			if(isset($_POST['cli_pseudo']) &&
			   isset($_POST['cli_motpasse']) && 
			   isset($_POST['mdp_confirm']) && 
			   isset($_POST['cli_mel']) && 
			   isset($_POST['mail_confirm']) && 
			   isset($_POST['cli_nom'])  && 
			   isset($_POST['cli_prenom']) && 
			   isset($_POST['cli_telfixe'])&&
			   isset($_POST['cli_telportable'])){

			   	$pattern = '/[\[\]* + ? | { } () ^ ." <> ! $ ; : § , ¨ & ~ \\\ \/ @ = ]/';
			    $patterntelfixe = '/^0[1-58][0-9]{8}$/';
			    $patterntelport = '/^0[67][0-9]{8}$/';
			    $pattern_nom = '/[0-9\[\]* + ? | { } () ^ ." <> ! $ ; : § , ¨ & ~ \\\ \/ @ = ]/';

			   //verif civilité
			   if(empty($_POST['cli_civilite'])){
					$msgerror = "Veuillez choisir une civilité";
					$data [] = $msgerror;
				}

			   //verif pseudos

				if(empty($_POST['cli_pseudo'])){
					$msgerror = "Le champ Pseudo est vide";
					$data [] = $msgerror;
				}
				elseif(preg_match($pattern, $_POST['cli_pseudo'])){
					$msgerror = "Caractères spéciaux interdits dans le champ Pseudo";
					$data [] = $msgerror;
				}
				$listeclients = T_e_client_cli::findAll();
				foreach($listeclients as $t_e_client_cli){
					if(strtolower($_POST['cli_pseudo']) == strtolower($t_e_client_cli->cli_pseudo)){
						$msgerror = "Pseudo déjà enregistré";
						$data [] = $msgerror;
					}

				}

				//verifs mdp & confirmation
				if(empty($_POST['cli_motpasse'])){
					$msgerror = "Le champ Mot de passe est vide";
					$data [] = $msgerror;
				}
			    if(empty($_POST['mdp_confirm'])){
					$msgerror = "Le champ Confirmez votre mot de passe est vide";
					$data [] = $msgerror;
				}
				if(preg_match($pattern, $_POST['cli_motpasse'])) {
					$msgerror = "Caractères spéciaux interdits dans le champ Mot de passe";
					$data [] = $msgerror;
				}
				if (strlen($_POST['cli_motpasse']) < 8 || strlen($_POST['cli_motpasse']) > 15){
					$msgerror = "Le mot de passe doit contenir entre 8 et 15 caractères alphanumériques";
					$data [] = $msgerror;
				}
				if($_POST['cli_motpasse'] != $_POST['mdp_confirm']){
					$msgerror = "Le mot de passe et la confirmation ne correspondent pas";
					$data [] = $msgerror;
				}

				//verif mail
				if(empty($_POST['cli_mel'])){
					$msgerror = "Le champ Adresse email est vide";
					$data [] = $msgerror;
				}else if (!filter_var($_POST['cli_mel'], FILTER_VALIDATE_EMAIL)){
					$msgerror = "Le format de l'adresse mail est invalide";
					$data [] = $msgerror;
				}
				$listeclients = T_e_client_cli::findAll();
				foreach($listeclients as $t_e_client_cli){
					if($_POST['cli_mel']==$t_e_client_cli->cli_mel){
						$msgerror = "Adresse email déjà utilisée";
						$data [] = $msgerror;
					}

				}

				if(empty($_POST['mail_confirm'])){
					$msgerror = "Le champ Confirmez votre adresse email est vide";
					$data [] = $msgerror;
				}
				if($_POST['cli_mel'] != $_POST['mail_confirm']){
					$msgerror = "L\'email et la confirmation ne correspondent pas";
					$data [] = $msgerror;
				}

				//verif nom et prenom

				if(empty($_POST['cli_nom'])){
					$msgerror = "Le champ Nom est vide";
					$data [] = $msgerror;
				}elseif(preg_match($pattern_nom, $_POST['cli_nom'])){
					$msgerror = "Veuillez rentrer un nom valide";
					$data [] = $msgerror;
				}

				if(empty($_POST['cli_prenom'])){
					$msgerror = "Le champ Prénom est vide";
					$data [] = $msgerror;
				}elseif(preg_match($pattern_nom, $_POST['cli_prenom'])){
					$msgerror = "Veuillez rentrer un prénom valide";
					$data [] = $msgerror;
				}

				//verif tel 

				if(empty($_POST['cli_telfixe']) && empty($_POST['cli_telportable'])){
					$msgerror = "Au moins un numéro de téléphone doit être renseigné";
					$data [] = $msgerror;
				}
				if((!empty($_POST['cli_telfixe'])) && !preg_match($patterntelfixe,$_POST['cli_telfixe'])){
						$msgerror = "Format téléphone fixe invalide";
						$data [] = $msgerror;
				}
				if((!empty($_POST['cli_telportable'])) && !preg_match($patterntelport,$_POST['cli_telportable'])){
						$msgerror = "Format téléphone portable invalide";
					    $data [] = $msgerror;
				}
				foreach($listeclients as $t_e_client_cli){
					if($_POST['cli_telportable']==$t_e_client_cli->cli_telportable && $_POST['cli_telportable'] != null){
						$msgerror = "Numéro de téléphone portable déjà utilisé";
						$data [] = $msgerror;
						break;
					}

				}


				if(!empty($data)){
					$this->render("add",$data);
				}else{
					$client = new T_e_client_cli();
						
						$client->cli_mel=parameters()["cli_mel"];
						$client->cli_motpasse=md5(parameters()["cli_motpasse"]);
						$client->cli_pseudo=parameters()["cli_pseudo"];
						$client->cli_civilite=parameters()["cli_civilite"];
						$client->cli_nom=parameters()["cli_nom"];
						$client->cli_prenom=parameters()["cli_prenom"];
						$client->cli_telfixe=parameters()["cli_telfixe"];
						$client->cli_telportable=parameters()["cli_telportable"];

						
					
					$client2 = new T_e_client_cli($client->cli_id);
					$_SESSION['client'] = serialize($client2);
					
					$c = new SiteController();
					$c->index();
								
				}

			}else {	
			$this->render("add");
			}
	}
	
	public function formconnectaction(){
			
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

						if(($t_e_client_cli->cli_motpasse) == md5($_POST['connectionMdp'])){	
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
	public function logout(){
		session_destroy();
		header('Location: ?r=site/index');
	}

}