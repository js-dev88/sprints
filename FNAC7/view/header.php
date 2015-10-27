<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
	<link rel="stylesheet" type="text/css" href="./css/animate.css" />
	<link rel="shortcut icon" type="image/x-icon" href="./image/fnacfvi.png" />
</head>
<body>
	<main>
	<header class="header">
		<div class="logo">
				<a href="?r=site/index"><img id="logo" src="image/logo.png" alt="" /></a>
		</div>
		<div class="container">
			<form action="?r=t_e_jeuvideo_jeu/search" method="post">
			<div class="search" >
				<div id="fieldset">
					<div class="boxselect">
						<select  id="searchselect" name="choiceconsole">
							<option name="Consoles" id="console" value="console">Consoles</option>
								<?php
								  $listeConsole=T_r_console_con::findAll();
								  foreach($listeConsole as $t_r_console_con) {
								  	$val = $t_r_console_con->con_nom;
									echo "<option value =\"".$val."\"";
								    if(isset($_POST["choiceconsole"]) && $_POST["choiceconsole"] == $val)
								    	 echo 'selected="selected"';
								    echo ">".$val."</option>";
								  }?>	
						</select>	
						
					</div>				
					<div class="boxselect">
						<select  id="searchselect" name="choicerayon">
								<option value="rayon" name="rayon">Rayons</option>
									<?php
									  $listeRayon=T_r_rayon_ray::findAll();
									    foreach($listeRayon as $t_r_rayon_ray) {
										  	$val = $t_r_rayon_ray->ray_nom;
											echo "<option value =\"".$val."\"";
										    if(isset($_POST["choicerayon"]) && $_POST["choicerayon"] == $val)
										    	 echo 'selected="selected"';
										    echo ">".$val."</option>";
										}?>	
						</select>			
					</div>

					<input id="searchinput" type="text" name="mot_clef" placeholder=" Que recherchez-vous?" 
					value ="<?php echo(isset($_POST['mot_clef']) ? $_POST['mot_clef'] : null);?>"></input>
					<a id="searchlink">
						<button id="searchbtn" type="submit" title ="lancer la recherche"  >
							<img id="searchicon" src="image/searchicon.png" alt="" />
						</button>
					</a>
					
				</div>
			</div>
			</form>
			<div class="menu">				
					<ul>
						<li class="limenu" id="connection"><noscript><a href ="?r=t_e_client_cli/index"></noscript><button class ="btnmenu" id="btnconnection">Me connecter</button><noscript></a></noscript>
							<ul class= "ulformconnect">
								<li>
										<div id="connectFormdiv">
											<form id="formconnection" action="#">
												<span id="msgError"></span>
										
												<div class = "formgroup">
													<label class ="labelconnect" for="connectionEmail">E-mail : </label>
													<input class="inputconnect" id="connectionEmail" name ="connectionEmail"  type="text"/>
												</div>

												<div class = "formgroup">
													<label class ="labelconnect" for="connectionMdp">Mot de passe : </label>
													<input class="inputconnect" id="connectionMdp" name ="connectionMdp"   type="password" />
												</div>

												<input class="btnconnect" id="submitConnection" name ="submitConnection" type="submit" value="Me connecter"/>
											 </form>  
										</div>
										
								</li>
							</ul>
						<li class="limenu" id="inscription"><button class ="btnmenu" onclick="window.location.href='?r=t_e_client_cli/add'" id="btninscription">M'inscrire</button></li>
						
						<!--bouton panier affichage traité dans connexion.js-->
					
						
						<a href="?r=t_e_commande_com/panier"/><button class ="btnmenu" id="btnpanier">Mon Panier
							<span id="msgNbArticles">
								<?php 
		        						//maj du compteur dans addPanier.js
										$lc = new T_e_commande_comController();
										if(isset($_SESSION['client']) && !empty($_SESSION['client'])){
        									echo "(".$lc->nbArticlesPanier().")";
        								}
								?>
							</span>
					    </button></a>
						
						<?php
						if(isset($_SESSION['client']) && !empty($_SESSION['client'])){
							$recupSV=unserialize($_SESSION['client']);
						    if($recupSV->cli_mel == "service.com@fnac.fr"){
						    	echo "<a href='?r=t_e_client_cli/avisAbf'/><button class ='btnmenu' id='btnAbf'>Avis Abusifs</button></a>";	
						    }
						}
						?>
										
						<a href="?r=t_e_client_cli/view">															
						<button class ="btnmenu" id="btnprofil">
						<div id="pseudo">
						<?php
						if(isset($_SESSION['client']) && !empty($_SESSION['client'])){
							$client=unserialize($_SESSION['client']);
           					$id = ucfirst($client->cli_pseudo);

           					echo "<span id=\"monpseudo\"><img id=\"logopseudo\" src=\"image/connecter logo.png\"/>".$id." - Profil</span>";		
						}
						?>
						</div>
						</button>
					    </a>
					  </li>
					  
					</ul>
			</div>
		</div>
	</header>	
	<section>	




						