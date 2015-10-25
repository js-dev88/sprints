<div class="cacheheader"></div>

<h2>Liste des adresses</h2>

<?php

$osefdunom=T_e_adresse_adrController::getAllAdesse();
print_r($osef);

	echo "<ul>";
		foreach($data as $adresse){
			echo "<li>";
			echo $adresse->adr_id."(adr_id)</br>";
			echo $adresse->cli_id"(cli_id)</br>";
			echo $adresse->adr_nom"(adr_nom)</br>";
			echo $adresse->adr_type"(adr_type)</br>";
			echo $adresse->adr_rue"(adr_rue)</br>";
			echo $adresse->adr_complementrue"(adr_complementrue)</br>";	
			echo $adresse->adr_cp"(adr_cp)</br>";
			echo $adresse->adr_ville"(adr_ville)</br>";
			echo $adresse->pays_id"(pays_id)</br>";
			echo $adresse->adr_latitude"(adr_latitude)</br>";
			echo $adresse->adr_longitude"(adr_longitude)</br>";
			echo "</li>";	
		}
		echo "</ul>";
?> 