<div id="affichebtn">
<?php
if(isset($_SESSION['client']) && !empty($_SESSION['client'])){

	echo "<button id=\"btndeconnection\" onclick=\"window.location.href='?r=t_e_client_cli/logout'\">Déconnexion</button>";
}
?>
</div>
<div>
<h2>Recherche pour Jeux vidéos</h2>
<?php
	$list=T_e_jeuvideo_jeuController::search();
	foreach($list as $t_e_jeuvideo_jeu){
		echo "<table><tr>";
		echo"<td>"."Id jeu : ".$t_e_jeuvideo_jeu->jeu_id."</td>";
		echo"<td>"."Nom jeu : ".$t_e_jeuvideo_jeu->jeu_nom."</td>";
		echo "</tr></table>";
	}
?>

</div>