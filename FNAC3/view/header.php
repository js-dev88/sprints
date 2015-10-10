<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
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
							<option name="Consoles" id="console" value="console">Toutes les consoles</option>
								<?php
								  $listeConsole=T_r_console_con::findAll();
								  foreach($listeConsole as $t_r_console_con) {
									echo"<option>".$t_r_console_con->con_nom."</option>";
									}
								?>
								
							
						</select>	
						
					</div>
					
					

					<input id="searchinput" type="text" name="mot_clef" placeholder=" Que recherchez-vous?"></input>
					<a id="searchlink">
						<button id="searchbtn" type="submit" title ="lancer la recherche"  >
							<img id="searchicon" src="image/searchicon.png" alt="" />
						</button>
					</a>
					
					<div class="boxselect">
					
					<select  id="searchselect" name="choicerayon">
							<option value="rayon" name="rayon">Tous les rayons</option>
								<?php
								  $listeRayon=T_r_rayon_ray::findAll();
								  foreach($listeRayon as $t_r_rayon_ray) {
									echo"<option>".$t_r_rayon_ray->ray_nom."</option>";
									}
								?>
					</select>	
					
					</div>
					
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





						