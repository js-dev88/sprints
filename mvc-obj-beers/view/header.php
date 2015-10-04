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
				<a href=""><img id="logo" src="image/logo.png" alt="" /></a>
		</div>
		<div class="container">
			<div class="search">
				<form id="quicksearch">
				</form>
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
						<li class="limenu" id="connection"><noscript><a href ="?r=t_e_client_cli/index"></noscript><button class ="btnmenu" id="btnconnection">Me connecter</button><noscript></a></noscript></li>
							<ul class= "ulformconnect">
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
							</ul>
						<li class="limenu" id="inscription"><button class ="btnmenu" id="btninscription">M'inscrire</button></li>
						
						<a href="?r=t_e_client_cli/view">															
						<button class ="btnmenu" id="btnprofil">Mon Profil</button>
					    </a>
					</ul>
			</div>
		</div>
	</header>	
	<section>	
</body>
</html>



						