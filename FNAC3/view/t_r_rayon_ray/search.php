<div id="affichebtn">
<?php
if(isset($_SESSION['client']) && !empty($_SESSION['client'])){

	echo "<button id=\"btndeconnection\" onclick=\"window.location.href='?r=t_e_client_cli/logout'\">Déconnexion</button>";
}
?>
</div>
<div>
<h2>Recherche par Rayon</h2>
<?php
	$list=t_r_rayon_ray::search();
	foreach($list as $t_r_rayon_ray) {
		echo "<table><tr>";
		echo"<td>"."Id rayon : ".$t_r_rayon_ray->ray_id."</td>";
		echo"<td>"."Nom rayon : ".$t_r_rayon_ray->ray_nom."</td>";
		echo "</tr></table>";
	}

?>

</div>