
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
				if($photo->jeu_id == $t_e_jeuvideo_jeu->jeu_id ){
				 echo "<img src=\"".$photo->pho_url."\"/></a>";
				 break;
				}
			}
				$moyavis=0;
				$nbAvis = count(T_e_avis_avi::FindAll($t_e_jeuvideo_jeu->jeu_id));
				
				echo"<p>Avis (".$nbAvis.")</p>";
				foreach(T_e_avis_avi::FindAll($t_e_jeuvideo_jeu->jeu_id) as $avis){
					$moyavis+=$avis->avi_note;
				}
				if($nbAvis!=0){
					$moyavis= $moyavis/$nbAvis;
				}else {
					$moyavis=0;
				}
				echo "<p> Note Clients </p><span id='view_span' class='star S".round($moyavis)."'></span>";
				echo "</a></td>";
				
			
			
			
			echo"<td id='td_Central_Search'>"."<h3><a href=\"?r=t_e_jeuvideo_jeu/view&id=".$t_e_jeuvideo_jeu->jeu_id."\">".$t_e_jeuvideo_jeu->jeu_nom."</h3></a>";
			
			$date = $t_e_jeuvideo_jeu->jeu_dateparution;
			echo"<br/>";
			echo "<p>Date de parution : ".$date."</p>";
			$consoleNom = new T_r_console_con($t_e_jeuvideo_jeu->con_id);
			$consoleNom = $consoleNom->con_nom;
			$editeurNom = new T_r_editeur_edi($t_e_jeuvideo_jeu->edi_id);
			$editeurNom = $editeurNom->edi_nom;
			
			echo "<p>Console : ".$consoleNom."</p>";
			echo "<p>Editeur : ".$editeurNom."</p>";
			
			echo "<p>Public legal : ".$t_e_jeuvideo_jeu->jeu_publiclegal."</p>";
			echo"</td>";
			echo"<td><p>"."Prix : ".$t_e_jeuvideo_jeu->jeu_prixttc." €</p>";
			echo "<p>En Stock :".$t_e_jeuvideo_jeu->jeu_stock." exemplaires</p>";
			
			echo "<a href='?r=t_e_commande_com/panier' ><div><p>Ajouter au panier</p><img id='boutonpanier' src='image/panier.png'></div></a></td>";
			
			
			echo "</tr>";
			
		}
	}
?>
</table>
</div>