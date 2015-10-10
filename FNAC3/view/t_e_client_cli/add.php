

<h2 id="m_inscrire">M'inscrire</h2>
<hr>
<p id="msgErrorInscription">
<?php 
	if(isset($data)){
	foreach($data as $k => $v)
		echo "<p class=\"msgErreur\">".$v."</p>";
	}
?>

</p>

<table id="tableIns">
				<form method="post" id="forminscriptionclient" action="?r=t_e_client_cli/add">

					<p>Les champs renseignés d'un astérique (*) sont obligatoires.</p>

					<label id ="lblcivilite" class="lblInscript" for="civilite">Civilité (*)</label>	 
			        <input type="radio"  
			        	<?php if (isset($_POST["cli_civilite"])) { if ($_POST["cli_civilite"] == "Mlle") { echo "checked"; } } ?> 
			        name="cli_civilite" value="Mlle" />
			        <label class="lblbtnradIns"for="Mlle">Mlle</label>					
					<input type="radio" 
						<?php if (isset($_POST["cli_civilite"])) { if ($_POST["cli_civilite"] == "Mme") { echo "checked"; } } ?> 
					name="cli_civilite" value="Mme" />
					<label class="lblbtnradIns"for="Mme">Mme</label>	
					<input type="radio" 
						<?php if (isset($_POST["cli_civilite"])) { if ($_POST["cli_civilite"] == "M.") { echo "checked"; } } ?> 
					name="cli_civilite" value="M."/>
					<label class="lblbtnradIns" for="M.">M.</label>		
					

					<label class="lblInscript" for="pseudo">Pseudo (*)</label>
					<input class="iptInscript" type="text" name="cli_pseudo" id="pseudo" size="30" 
					value ="<?php echo(isset($_POST['cli_pseudo']) ? $_POST['cli_pseudo'] : null);?>" />
						
					<p>Le mot de passe doit contenir entre 8 et 15 caractères alphanumériques</p>									
					<label class="lblInscript" for="mdp">Mot de passe (*)</label>
					<input class="iptInscript" type="password" name="cli_motpasse" id="mdp" size="30" 
					value ="<?php echo(isset($_POST['cli_motpasse']) ? $_POST['cli_motpasse'] : null);?>" />
										
					<label class="lblInscript" for="mdp_confirm">Confirmez votre mot de passe (*)</label>
					<input class="iptInscript" type="password" name="mdp_confirm" id="mdp_confirm" size="30" 
					value ="<?php echo(isset($_POST['mdp_confirm']) ? $_POST['mdp_confirm'] : null);?>" /> 
										
					<label class="lblInscript" for="mail">Adresse email (*)</label>
					<input class="iptInscript"  type="text" name="cli_mel" id="mail" size="30" 
					value ="<?php echo(isset($_POST['cli_mel']) ? $_POST['cli_mel'] : null);?>"/>
										
					<label class="lblInscript" for="mail_confirm">Confirmez votre adresse email (*)</label>
					<input class="iptInscript" type="text" name="mail_confirm" id="mail_confirm" size="30" 
					value ="<?php echo(isset($_POST['mail_confirm']) ? $_POST['mail_confirm'] : null);?>"/>
						
					<label class="lblInscript" for="nom">Nom (*)</label>
					<input class="iptInscript" type="text" name="cli_nom" id="nom" size="30" 
					value ="<?php echo(isset($_POST['cli_nom']) ? $_POST['cli_nom'] : null);?>"/>
						
					<label class="lblInscript" for="prenom">Prénom (*)</label>
					<input class="iptInscript" type="text" name="cli_prenom" id="prenom" size="30" 
					 value ="<?php echo(isset($_POST['cli_prenom']) ? $_POST['cli_prenom'] : null);?>"/>	
				
					<p>Veuillez renseigner au moins un numéro de téléphone</p>
					<label class="lblInscript" for="telf">Téléphone Fixe</label>
					<input class="iptInscript" type="text" name="cli_telfixe" id="telfixe" size="30" placeholder="0405060708" 
					value ="<?php echo(isset($_POST['cli_telfixe']) ? $_POST['cli_telfixe'] : null);?>"/>
					
					<label class="lblInscript" for="telport">Téléphone Portable</label>
					<input class="iptInscript" type="text" name="cli_telportable" id="telportable" size="30" placeholder="0605060708" 
					value ="<?php echo(isset($_POST['cli_telportable']) ? $_POST['cli_telportable'] : null);?>"/>
					
					<div>
					<input id="iptsubIns" type="submit" value="Valider" class="valider" />
					</div>
					
					
					

				</form>
</table>