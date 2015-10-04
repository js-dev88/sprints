<html>
<body

<div class="cacheheader"></div>

<h2>Liste des gens</h2>

<table>
<?php
		echo "<ul>";
		foreach($data as $t_e_client_cli) {
			echo "<li>";
			echo $t_e_client_cli->cli_mel;
			echo $t_e_client_cli->cli_pseudo;
			echo $t_e_client_cli->cli_civilite;
			echo $t_e_client_cli->cli_nom;
			echo $t_e_client_cli->cli_prenom;
			echo $t_e_client_cli->cli_motpasse;
			echo "</li>";	
		}
		echo "</ul>";
?>
</table>

<h2>Login</h2>


<div id="connectFormdiv">
		 	<form action="?r=t_e_client_cli/formconnectaction" method="post">

		        <div class = "formgroup">
		        	<label class ="labelconnect" for="connectionEmail">E-mail : </label>
		        	<input id="connectionEmail" name ="connectionEmail"  type="text"/>
		        </div>

		        <div class = "formgroup">
					<label class ="labelconnect" for="connectionMdp">Mot de passe : </label>
					<input id="connectionMdp" name ="connectionMdp"   type="password" />
		        </div>

		        <input id="submitConnection" name ="submitConnection" type="submit" value="Me connecter"/>
		     </form>       
</div>

