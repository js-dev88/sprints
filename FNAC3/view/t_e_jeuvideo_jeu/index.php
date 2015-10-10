

<html>
<body>
</br>
</br>
</br>
</br>
</br>
</br>
	<h2>Liste des Jeux</h2>

<table>

<?php




		
		$listeConsole=T_e_jeuvideo_jeu::findAll();
		print_r($listeConsole);

		echo "<ul>";
		foreach($data as $t_e_jeuvideo_jeu) {
			echo "<li>";
			echo $t_e_jeuvideo_jeu->jeu_id;
			echo $t_e_jeuvideo_jeu->jeu_nom;
			echo $t_e_jeuvideo_jeu->jeu_dateparution;
			echo $t_e_jeuvideo_jeu->$jeu_prixttc;;
			echo $t_e_jeuvideo_jeu->$jeu_codebarre;;
			echo "</li>";	
		}
		echo "</ul>";
?>
</table>
