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
        $pseudo = ucfirst($client->cli_pseudo);
        echo $pseudo;		
	}?>
	- Mon Profil</h2>
<hr>
<div id="info_client">
<form id='formupdate' action='#'>

<?php 
		
		echo "<p>Pseudo : <input name='pseudo_update' class='input_info form-control' type='text'value='".$data->cli_pseudo."'><span class='info_hide'>".$data->cli_pseudo."</span></p>";
		echo "<p>Nom : <input name='nom_update' class='input_info form-control' type='text'value='".$data->cli_nom."'><span class='info_hide'>".$data->cli_nom."</span></p>";
		echo "<p>Prénom : <input name='prenom_update' class='input_info form-control' type='text'value='".$data->cli_prenom."'><span class='info_hide'>".$data->cli_prenom."</span></p>";
		echo "<p>Email : <input name='mail_update' class='input_info form-control' type='text'value='".$data->cli_mel."'><span class='info_hide'>".$data->cli_mel."</span></p>";
		echo "<p>Tel Fixe : <input name='telfixe_update'class='input_info form-control' type='text'value='".$data->cli_telfixe."'><span class='info_hide'>".$data->cli_telfixe."</span></p>";
		echo "<p>Tel Portable : <input name='telpor_update' class='input_info form-control' type='text'value='".$data->cli_telportable."'><span class='info_hide'>".$data->cli_telportable."</span></p>";
?>
<button type='button' class='btn_btn' id='modif_info_form'>Modifier</button>
</form>
<span id="msgModif"></span>
<button class='btn_btn' id='annuler_modif'>Annuler</button>
<button class='btn_btn' type='button' id='modif_info'>Modifier</button>
</div>


