<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>FNAC.com</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>
	
	<header class="header">
		<div class="logo">
				<a href=""><img id="logo" src="image/logo.png" alt="" /></a>
		</div>
		<div class="container">
			<div class="search">
				<form id="quicksearch">
				<form>
				<div id="fieldset">
					<div class="boxselect">
						<select  id="searchselect">
								<option selected> Tous </option>
						</select>	
					</div>
					<input size="65"id="searchinput"type="text" name="search" placeholder=" Que recherchez vous?">
					</input>
					<button id="searchbtn" type="submit" title ="lancer la recherche">
						<a id="searchlink"href=""><img id="searchicon" src="image/searchicon.png" alt="" /></a>
					</button>
				</div>
			</div>
			<div class="menu">				
					<ul>
						<li class="limenu" id="connection"><button class ="btnmenu" id="btnconnection">Me connecter</button></li>
						<li class="limenu" id="inscription"><button class ="btnmenu" id="btninscription">M'inscrire</button></li>
						<li class="limenu" id="profil"><button class ="btnmenu" id="btncontact"></button>Mon Profil</li>
					</ul>
			</div>
		</div>
		<!--<nav id= "navheader">

			<ul>

				
		        <li class="liheader"><button id="btnConnect" class="btnConnect">Se connecter</button></li>   
		        <li class="liheader"><button class= "btnInscr" id="inscriptionbutton">Inscription</button></li>
				

		        <li class="liheader"><a href="?r=t_e_client_cli">Profil</a></li>  -->
				<!--<li class="search"><select type="text" name="consoleSearch" id="consoleSearch"><br>
										<?php
										/*$listeConsole=T_r_console_con::findAll();
										foreach($listeConsole as $t_r_console_con) {
											echo"<OPTION>".$t_r_console_con->con_nom;
										}*/
										?>
									</select>
				<input type="text" name="btnSearch" id="btnSearch" placeholder="Entrez un ou plusieurs mot(s)-clé(s)">
				<input type="submit" value="Rechercher"></li>
				
			</ul>-->
		
		</header>						
	<section>	
</body>
</html>	
