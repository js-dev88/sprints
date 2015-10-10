

<html>
<body>
</br>
</br>
</br>
</br>
</br>
</br>
	<h2>Liste des Rayons</h2>

<table>

<?php




		
		$listeConsole=t_r_rayon_ray::findAll();
		print_r($listeConsole);

		echo "<ul>";
		foreach($data as $t_r_rayon_ray) {
			echo "<li>";
			echo $t_r_rayon_ray->ray_id;
			echo $t_r_rayon_ray->ray_nom;
			echo "</li>";	
		}
		echo "</ul>";
?>
</table>