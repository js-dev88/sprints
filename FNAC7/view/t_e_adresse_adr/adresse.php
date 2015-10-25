<html>
<body>


<div id="affichebtn">
<?php
if(isset($_SESSION['client']) && !empty($_SESSION['client'])){

	echo "<button id=\"btndeconnection\" onclick=\"window.location.href='?r=t_e_client_cli/logout'\">Déconnexion</button>";
}
?>
</div>



<h2 id="adresse">Finalisation de la commande : </h2>
</br></br>
<?php

	$choiceadr=T_e_adresse_adrController::getAllAdresse();
	//print_r($data);

	
?>
 
    <label for="facturation">A quel adresse s'effectuera la facturation ?</label><br />
	<select name="facturation" id="facturation">
	
	<?php
	foreach ($choiceadr as $lieufacturation)
	{
	?>
	<option><?php echo ">".$lieufacturation['adr_nom']."<";?> </option>
	<?php
	}
	?>
	</select>	

	<label for="livraison">A quel adresse s'effectuera la livraison ?</label><br />
	<select name="livraison" id="livraison">
	
	<?php
	foreach ($choiceadr as $lieulivraison)
	{
	?>
	<option><?php echo ">".$lieulivraison['adr_nom']."<";?> </option>
	<?php
	}
	?>
	</select>
	
	
	