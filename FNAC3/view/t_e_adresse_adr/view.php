<html>
<body>


<div id="affichebtn">
<?php
if(isset($_SESSION['client']) && !empty($_SESSION['client'])){

	echo "<button id=\"btndeconnection\" onclick=\"window.location.href='?r=t_e_client_cli/logout'\">Déconnexion</button>";
}
?>
</div>

<h2 id="profil">View adresse</h2>
<hr>
<div id="info_client">
<?php
	echo "<ul>";
		
			echo "<li>";
			echo $data->adr_id;
			echo $data->cli_id;
			echo $data->adr_nom;
			echo $data->adr_type;
			echo $data->adr_rue;
			echo "</li>";	
	
		echo "</ul>";
?> 