

<html>
<body>
</br>
</br>

	<h2>Liste des Commandes</h2>

<table>

<?php
		//$osefdunom=T_e_commande_com::findAll();
		//print_r($osef);
		echo "<ul>";
		foreach($data as $t_e_commande_com) {
			echo "<li>";
			echo $t_e_commande_com->com_id." (idcommande)<br/>";
			echo $t_e_commande_com->rel_id."(rel_id)<br/>";
			echo $t_e_commande_com->adr_id."(adr_id)<br/>";
			echo $t_e_commande_com->cli_id."(cli_id)<br/>";
			echo $t_e_commande_com->com_date."(com_date)<br/>";
			echo "</li>";	
		}
		echo "</ul>";
?>
</table>
