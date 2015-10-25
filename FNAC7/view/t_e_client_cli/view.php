<html>
<body>


<div id="affichebtn">
<?php
if(isset($_SESSION['client']) && !empty($_SESSION['client'])){

	echo "<button id=\"btndeconnection\" onclick=\"window.location.href='?r=t_e_client_cli/logout'\">Déconnexion</button>";
}
?>
</div>

<h2 id="profil">
	<?php if(isset($_SESSION['client']) && !empty($_SESSION['client'])){
		$client=unserialize($_SESSION['client']);
        $pseudo = ucfirst(strtolower($client->cli_pseudo));
        echo $pseudo;
		$recuppseudo = db()->prepare("select cli_pseudo from t_e_client_cli;");
		$recuppseudo->execute();
		$tabpseudo = $recuppseudo->fetchAll();
		$jspseudo = json_encode($tabpseudo);
		$jscurrentpseudo = json_encode($client->cli_pseudo);
        $recupmail = db()->prepare("select cli_mel from t_e_client_cli;");	
		$recupmail->execute();
		$tabemail = $recupmail->fetchAll();
		$jsonemail = json_encode($tabemail);		
		$jsoncurrentmail=json_encode($client->cli_mel);
	}?>
	- Mon Profil</h2><script type="text/javascript">
var tabmail = <?php echo $jsonemail; ?>;
var currentmail = <?php echo $jsoncurrentmail;?>;
var currentpseudo = <?php echo $jscurrentpseudo;?>;
var tabpseudo = <?php echo $jspseudo; ?>;
</script>
<hr>
<div id="info_client">
<form id='formupdate' action='#'>

<?php 
		
		echo "<p><label class='lblupdate'>Pseudo : </label></br><input name='pseudo_update' class='input_info iptInscript' type='text'value=\"".$data[0]->cli_pseudo."\"><span class='info_hide'>".$data[0]->cli_pseudo."</span></p>";
		echo "<p><label class='lblupdate'>Nom : </label></br><input name='nom_update' class='input_info iptInscript' type='text'value=\"".$data[0]->cli_nom."\"><span id='prenom_update_info' class='info_hide'>".$data[0]->cli_nom."</span></p>";
		echo "<p><label class='lblupdate'>Prénom : </label></br><input name='prenom_update' class='input_info iptInscript' type='text'value=\"".$data[0]->cli_prenom."\"><span class='info_hide'>".$data[0]->cli_prenom."</span></p>";
		echo "<p><label class='lblupdate'>Email : </label></br><input name='mail_update' class='input_info iptInscript' type='text'value='".$data[0]->cli_mel."'><span class='info_hide'>".$data[0]->cli_mel."</span></p>";
		echo "<p><label class='lblupdate'>Tel Fixe : </label></br><input name='telfixe_update'class='input_info iptInscript' type='text'value='".$data[0]->cli_telfixe."'><span class='info_hide'>".$data[0]->cli_telfixe."</span></p>";
		echo "<p><label class='lblupdate'>Tel Portable : </label></br><input name='telpor_update' class='input_info iptInscript' type='text'value='".$data[0]->cli_telportable."'><span class='info_hide'>".$data[0]->cli_telportable."</span></p>";
		echo"<p class='mdp_class'><label class='lblupdate'>Nouveau mot de passe : </label></br><input name='mdp_update' class='input_info iptInscript' type='password'></input></p>";
		echo "<p class='mdp_class'><label class='lblupdate'>Confirmation nouveau mot de passe :</label></br><input name='mdp_confirm_update' type='password' class='input_info iptInscript'></input></p>"
?>
<button type='button' name="submit_update" class='btn_btn' id='modif_info_form'>Modifier</button>
</form>

<button class='btn_btn' id='annuler_modif'>Annuler</button>
<button class='btn_btn' type='button' id='modif_info'>Modifier</button>
<span>
<?php 
// print_r($data);


	// if(isset($data)){
	// foreach($data as $k)
	// 	echo "<p class=\"msgErreur\">".$k."</p>";
	// }
?>
</span>
</div>
<!--Favoris profil-->
<div id='listFav'>
<form id='listFavoris' action='post'>
<?php
	echo "<p><label class='lblFavori'>Favoris : </label></br>";
	// foreach(
	
?>
</form>
</div>

