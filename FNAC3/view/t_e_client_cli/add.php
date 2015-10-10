


<table>
				<form method="post" id="forminscriptionclient" action="?r=t_e_client_cli/add">
					<p  id="forminscr">
					<label for="civilite">Civilité (*)</label><br />
					 <input type="radio" name="cli_civilite" value="M." checked>M.
					 <br/>
					 <input type="radio" name="cli_civilite" value="Mlle" checked>Mlle
					 <br />
					<input type="radio" name="cli_civilite" value="Mme" checked>Mme
					<br />
					<label for="pseudo">Pseudo (*)</label><br />
					<input type="text" name="cli_pseudo" id="pseudo" size="30" />
						<br />
										
					<br />
									
					<label for="mdp">Mot de passe (*)</label><br />
					<input type="password" name="cli_motpasse" id="mdp" size="30" /><br />
										
					<label for="mdp_confirm">Confirmez votre mot de passe (*)</label><br />
					<input type="password" name="mdp_confirm" id="mdp_confirm" size="30" />
						<br />
										
					<br />
										
					<label for="mail">Adresse email (*)</label><br />
					<input  type="text" name="cli_mel" id="mail" size="30" /><br />
										
					<label for="mail_confirm">Confirmez votre adresse email (*)</label><br />
					<input  type="text" name="mail_confirm" id="mail_confirm" size="30" />
						<br />
					<label for="nom">Nom (*)</label><br />
					<input type="text" name="cli_nom" id="nom" size="30" />
						<br />
					<label for="prenom">Prénom (*)</label><br />
					<input type="text" name="cli_prenom" id="prenom" size="30" />	
					<br />
					<label for="telf">Téléphone Fixe</label><br />
					<input type="text" name="cli_telfixe" id="telfixe" size="10" />
					<br />
					<label for="telport">Téléphone Portable</label><br />
					<input type="text" name="cli_telportable" id="telportable" size="10" />
					<br />
					<input type="submit" value="Valider" class="valider" />
					</p>
					<label >Les champs renseignés d'un astérique (*) sont obligatoires.</label><br />
					<span id="msgErrorInscription"></span>
				</form>
</table>