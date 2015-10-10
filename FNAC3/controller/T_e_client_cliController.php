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
			 	&& !empty($_POST['pseudo_update'])
			 	&& !empty($_POST['nom_update'])
			 	&& !empty($_POST['prenom_update'])
			 	&& !empty($_POST['mail_update'])
			 	 ){
            $b->cli_pseudo=$_POST['pseudo_update'];
			$b->cli_nom=$_POST["nom_update"];
			$b->cli_prenom=$_POST["prenom_update"];
			$b->cli_mel=$_POST["mail_update"];
			$client->cli_pseudo=$_POST['pseudo_update'];
			$_SESSION['client']=serialize($client);



            }
		

			$this->render("view",$b);
		} catch (Exception $e) {
			(new SiteController())->render("index");
		    $this->render("error");
		}
	}
	public function error() {
    		$this->render("error");
  	}

	public function add () {
			if(isset($_POST['cli_civilite']) &&
			   isset($_POST['cli_pseudo']) &&
			   isset($_POST['cli_motpasse']) && 
			   isset($_POST['mdp_confirm']) && 
			   isset($_POST['cli_mel']) && 
			   isset($_POST['mail_confirm']) && 
			   isset($_POST['cli_nom'])  && 
			   isset($_POST['cli_prenom']) &&
			   !empty($_POST['cli_pseudo']) && 
			   !empty($_POST['cli_motpasse']) && 
			   !empty($_POST['mdp_confirm']) && 
			   !empty($_POST['cli_mel']) && 
			   !empty($_POST['mail_confirm']) && 
			   !empty($_POST['cli_nom'])  && 
			   !empty($_POST['cli_prenom']) &&
			   $_POST['cli_motpasse'] == $_POST['mdp_confirm'] &&
			   $_POST['cli_mel'] == $_POST['mail_confirm'] 
			   //ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØŒŠþÙÚÛÜÝŸàáâãäåæçèéêëìíîïðñòóôõöøœšÞùúûüýÿ¢ß¥£™©®ª×÷±²³¼½¾µ¿¶·¸º°¯§…¤¦≠¬ˆ¨‰±×÷²³€†‡\'“”«»•\]\[\}\{#\,;<>~()|&^@%*=/*+-%?!¤"
			  // !preg_match('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØŒŠþÙÚÛÜÝŸàáâãäåæçèéêëìíîïðñòóôõöøœšÞùúûüýÿ¢ß¥£', $_POST["cli_pseudo"] && $_POST["cli_motpasse"] && $_POST["mdp_confirm"] && $_POST['cli_nom'] && $_POST['cli_prenom']) &&
			   //!preg_match('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØŒŠþÙÚÛÜÝŸàáâãäåæçèéêëìíîïðñòóôõöøœšÞùúûüýÿ¢ß¥£™©®ª×÷±²³¼½¾µ¿¶·¸º°¯§…¤¦≠¬ˆ¨‰±×÷²³€†‡\'“”«»•][}{#,;<>~()|&^@%*=/*+-%?!¤"abcdefghijklmnopqrstuvwxyz', $_POST['cli_telfixe'] && $_POST['cli_telportable'])
			  )		{
		 
			
				
			
			$client = new T_e_client_cli();
			
			$client->cli_mel=parameters()["cli_mel"];
			$client->cli_motpasse=md5(parameters()["cli_motpasse"]);
			$client->cli_pseudo=parameters()["cli_pseudo"];
			$client->cli_civilite=parameters()["cli_civilite"];
			$client->cli_nom=parameters()["cli_nom"];
			$client->cli_prenom=parameters()["cli_prenom"];
			$client->cli_telfixe=parameters()["cli_telfixe"];
			$client->cli_telportable=parameters()["cli_telportable"];
			$this->render("index");
				
			
		}
		else {
			$this->render("add");
		}
		


	}
	
public function forminscriptionclient(){
			
		if(!empty($_POST['cli_civilite']))
		{
			echo "0";
		}
		else if(!empty($_POST['cli_motpasse'])){
			echo "1";
		}
		else if(!empty($_POST['mdp_confirm'])){
			echo "2";
		}
		else if($_POST['cli_motpasse'] != $_POST['mdp_confirm']){
			echo "3";
		}
		else if(!empty($_POST['cli_mel'])){
			echo "4";
		}
		else if((filter_var($_POST['cli_mel'], FILTER_VALIDATE_EMAIL)) == FALSE) {    
			echo "9";	//mail invalide					
		}
		else if(!empty($_POST['mail_confirm'])){
			echo "5";
		}
		else if((filter_var($_POST['mail_confirm'], FILTER_VALIDATE_EMAIL)) == FALSE) {    
			echo "10";	//mail invalide					
		}
		else if($_POST['cli_mel'] =! $_POST['mail_confirm']){
			echo "6";
		}else if(!empty($_POST['cli_nom'])){
			echo "7";
		}else if(!empty($_POST['cli_prenom'])){
			echo "8";
		}
		else if(!empty($_POST['cli_pseudo'])){
			echo "11";
		}
		else {
			echo "Wtf, un bug inconnu !";
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

	public function displayAdresseFac(){
 		$client=unserialize($_SESSION['client']);
		$id = $client->cli_id;
	 	$listeAdresse =T_e_adresse_adr::findAll();
	 	foreach($listeAdresse as $T_e_adresse_adr ){
	 		
	 		if($T_e_adresse_adr->cli_id == $id)
	 		{

	 			if($T_e_adresse_adr->adr_type == 'Facturation')
	 			{
	 				
	 				$this->render("view",$T_e_adresse_adr);
	 			}
	 		}
	 	}
 	}


}