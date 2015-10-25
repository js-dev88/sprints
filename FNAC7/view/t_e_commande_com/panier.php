<html>
<body>


<div id="affichebtn">
<?php
if(isset($_SESSION['client']) && !empty($_SESSION['client'])){

	echo "<button id=\"btndeconnection\" onclick=\"window.location.href='?r=t_e_client_cli/logout'\">Déconnexion</button>";
}
?>
</div>
<h2 id="panier">Mon panier</h2>
<?php
	// $osefdunom=T_j_lignecommande_lecController::recupval();
	 
	 
?>
	<table style="border:1">
		<tr>
			<td>Nom du/des articles</td>
			<td>Quantité</td>
			<td>Prix Unitaire</td>
			<td>Prix total</td>
		</tr>
<?php
	//foreach($data as $lignecommande){
		print_r($data);
		/*$jeu = new T_e_jeuvideo_jeu($lignecommande->jeu_id);
		echo "<tr>";
			echo"<td>".$lignecommande->$jeu->jeu_nom."</td>";
			echo"<td>".$lignecommande->lec_quantite."</td>";
			echo"<td>".$lignecommande->$jeu->jeu_prix." €</td>";
			echo"<td>".$lignecommande->$jeu->jeu_prix * $lignecommande->lec_quantite." €</td>";
		echo "</tr>";*/

	//}
?>
</table>