<?php
error_reporting(E_ALL); 
if (isset($_POST['sex']) && isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['mdp_confirm']) && isset($_POST['mail']) && isset($_POST['mail_confirm']) && isset($_POST['nom'])  && isset($_POST['prenom']))
{
	$nom = $_POST['nom'];
	$sex = $_POST['sex'];
	$pseudo= $_POST['pseudo'];
	$mdp = $_POST['mdp'];
	$mdpconf =$_POST['mdp_confirm'];
	$mail = $_POST['mail'];
	$mailconf = $_POST['mail_confirm'];
	$prenom = $_POST['prenom'];
	
	$req = $db -> execute('insert into t_e_client_cli(cli_mel, cli_motpasse, cli_pseudo, cli_civilite, cli_nom, cli_prenom) 
	VALUES('.$mail.','.$mdp.','.$pseudo.','.$sex.','.$nom.','.$prenom.')')
	or exit(print_r($db->errorInfo()));
		
	echo "<script>alert(\"Regarde ta bdd now\")</script>";
	print_r($req->errorInfo());
}
	else {
		echo "Problème formulaire";
	}
	
	
?>






