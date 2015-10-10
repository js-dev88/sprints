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
		foreach($data as $adresse){
			echo "<li>";
			echo $adresse->adr_id;
			echo $adresse->cli_id;
			echo $adresse->adr_nom;
			echo $adresse->adr_type;
			echo $adresse->adr_rue;
			echo "</li>";	
		}
		echo "</ul>";
?> 