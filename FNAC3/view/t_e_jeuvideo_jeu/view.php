<div id="affichebtn">
<?php
if(isset($_SESSION['client']) && !empty($_SESSION['client'])){

	echo "<button id=\"btndeconnection\" onclick=\"window.location.href='?r=t_e_client_cli/logout'\">Déconnexion</button>";
}
?>
</div>

<h2 id="nomjeu"><?php echo $data->jeu_nom;?></h2>
<hr>

<table>
<?php

	echo "<ul>";
			echo "<li>";
			echo "nom : ".$data->jeu_nom;
			echo "description :".$data->jeu_description;
			echo $data->jeu_dateparution;
			echo $data->jeu_codebarre;
			echo $data->jeu_publiclegal;
			echo "</li>";	
		echo "</ul>";
?> 
<table>