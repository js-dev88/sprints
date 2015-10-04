
<div class="headercache"></div>


<h2>Infos clients</h2>
 <div id="connectFormdiv">
		 	<form action="?r=t_e_client_cli/formconnectaction" method="post">
		        <div id="msgError">
		        </div>

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
<table>
<?php

print_r($_POST);/*
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
*/?>

</table>
