
<html>
<body>
<div id="affichebtn">
<?php
if(isset($_SESSION['client']) && !empty($_SESSION['client'])){

	echo "<button id=\"btndeconnection\" onclick=\"window.location.href='?r=t_e_client_cli/logout'\">Déconnexion</button>";
}
?>
</div>
<div>
<h2>Résultats de la recherche</h2>
<table>
<?php
	if(empty($data)){
		echo "Aucun jeu ne correspond à votre recherche";

	}else{
		foreach($data as $t_e_jeuvideo_jeu){
			
			echo "<tr>";
			echo "<td><a href=\"?r=t_e_jeuvideo_jeu/view&id=".$t_e_jeuvideo_jeu->jeu_id."\">";
			foreach(T_e_photo_pho::FindAll() as $photo){
				if($photo->jeu_id == $t_e_jeuvideo_jeu->jeu_id )
				echo "<img src=\"".$photo->pho_url."\"/>";
			}
			echo "</a></td>";
			echo"<td>"."Jeu : ".$t_e_jeuvideo_jeu->jeu_nom."</td>";
			echo"<td>"."Prix : ".$t_e_jeuvideo_jeu->jeu_prixttc." €</td>";
			echo "</tr>";
			
		}
	}
?>
</table>
</div>