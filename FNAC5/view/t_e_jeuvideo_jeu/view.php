<div id="affichebtn">
<?php
if(isset($_SESSION['client']) && !empty($_SESSION['client'])){

	echo "<button id=\"btndeconnection\" onclick=\"window.location.href='?r=t_e_client_cli/logout'\">Déconnexion</button>";
}
?>
</div>

<hr>
<h2 id="nomjeu"><?php echo $data->jeu_nom;?></h2>
<hr>

<table>
<?php
	echo "<tr>";
	foreach(T_e_photo_pho::FindAll($data->jeu_id ) as $photo){
				
				$moyavis=0;
				$nbAvis = count(T_e_avis_avi::FindAll($data->jeu_id));
				echo "<td class=\"td_Jv_View\">";
				echo"<img class=\"img_Jv_View\" src=\"".$photo->pho_url."\"/>";
				echo"<p><a href=\"#avis\"><button id='btn_avis' class='btn_btn'type='button'>Avis (".$nbAvis.")</button></a></p>";
				foreach(T_e_avis_avi::FindAll($data->jeu_id) as $avis){
					$moyavis+=$avis->avi_note;
				}
				if($nbAvis!=0){
					$moyavis= $moyavis/$nbAvis;
				}else {
					$moyavis=0;
				}
				echo "<p> Note Clients </p><span id='view_span' class='star S".round($moyavis)."'></span>";
				echo "</td>";
				break;
			}
			echo "<td id=\"descJV\" class=\"td_Jv_View\">";

			echo "<p>".$data->jeu_description."</p>";
			echo "<p>Date de parution : ".date("d-m-Y",strtotime($data->jeu_dateparution))."</p>";
			$consoleNom = new T_r_console_con($data->con_id);
			$consoleNom = $consoleNom->con_nom;
			$editeurNom = new T_r_editeur_edi($data->edi_id);
			$editeurNom = $editeurNom->edi_nom;
			
			echo "<p>Console : ".$consoleNom."</p>";
			echo "<p>Editeur : ".$editeurNom."</p>";
			echo "<p>Public legal : ".$data->jeu_publiclegal."</p>";
			echo "<p>Code barre : ".$data->jeu_codebarre."</p>";
			

			echo "</td>";


			echo "<td  class=\"td_Jv_View\">";
			echo "<p>".$data->jeu_prixttc." €</p>";
			echo "<p>En stock : ".$data->jeu_stock." exemplaires</p>";
			echo "<a href='?r=t_e_commande_com/panier'><div><p>Ajouter au panier</p><img id='boutonpanier' src='image/panier.png'></div></a>";
			

			echo "</td>";
				
	echo "</tr>";
?> 
</table>
<hr>
<h2>Photos</h2>
<hr>
<?php
	$id=1;
	foreach(T_e_photo_pho::FindAll() as $photo){
				if($photo->jeu_id == $data->jeu_id ){
					echo "<div id=\"divmin".$id."\" class=\"div_Photo_Jv_View\"><img id=\"".$id."\" class=\"photo_Jv_View\" src=\"".$photo->pho_url."\"/></div>";
					echo "<div id=\"divlbx".$id."\" class=\"lightbox\"><img id=\"lbx".$id."\" class=\"photo_Jv_lb\" src=\"".$photo->pho_url."\"/></div>";
				
					$id++;
				}
			}
			
?>
<hr>
<h2>Vidéos</h2>
<hr>
<?php


		foreach(T_e_video_vid::FindAll() as $video){
				if($video->jeu_id == $data->jeu_id ){
					echo "<div>";
					$recupPozPoint = strripos($video->vid_url,'.');
					
					$recupextension = substr($video->vid_url, $recupPozPoint+1);
					
					if($recupextension == "ogg" || $recupextension == "mp4" ){
					   echo "<video width=\"720\" height=\"405\" controls> ";
							/*foreach(T_e_photo_pho::FindAll() as $photo){
									if($photo->jeu_id == $data->jeu_id ){
									echo "poster=\"".$photo->pho_url."\">";
									break;
									}
								}*/
					   echo "<source src=\"".$video->vid_url."\" type=\"video/mp4\">";
					   echo "</video>";
					}else{
						
						echo "<iframe width=\"560\" height=\"315\" src=\"".$video->vid_url."\" frameborder=\"0\" allowfullscreen ></iframe>";
					}
					echo "</div>";	
				}
		}
		
		
				
?>

<hr>
<h2><a name="avis" id="avis">Avis</a></h2>
<hr>
<?php 
foreach (T_e_avis_avi::FindAll() as $avi) {
	if($avi->jeu_id==$data->jeu_id)
	{
		$client = new T_e_client_cli($avi->cli_id);
		
		echo "<div class='customer-name'>";
		echo "<p class='avis_p'>".$client->cli_pseudo."</p>";
		echo "<p class='avis_p'>Posté le : ".date("d-m-Y",strtotime($avi->avi_date))."</p>";
		echo "<span class='star S".$avi->avi_note."'></span>";
		echo "</div>";
		echo "<div class='customer-text'>";
		echo "<h4>".$avi->avi_titre."</h4>";
		echo "<p class='avis_p'>".$avi->avi_detail."</p>";
		echo "</div>";
		echo "<hr class='hr_avis'>";
	}
	
}
 ?>
<table>
</table>
<?php
if(isset($_SESSION['client']) && !empty($_SESSION['client'])){
		$recupSV=unserialize($_SESSION['client']);
	    if($recupSV->cli_mel == "service.vente@fnac.fr")
	    {
	    	echo "<h2>Ajouter des éléments</h2>";
	    	echo "<hr>";
	    	echo "<div><button id=\"addPhoto\" class=\"btn_btn\">Ajouter une Photo</button>";
		    ?>
		    	<p id="validPhotoUpload">Photo ajoutée</p>
		    	<div id="divAddPhoto">
		    		<span id="add_msgError"></span>
		    		<form id="formAddPhoto" action="#"> 
		    			<label class="lblInscript">Ajouter une url</label>
		    			<input id="iptAdd" name="pho_url" class="iptInscript" /> 
		    			<input type="hidden" name="jeu_id" value="<?php echo $data->jeu_id; ?>" /> 
		    			<div>
		    				<input id="iptSubAdd" type="submit" value="Enregister" class="btn_btn" />
		    				<button type="button" id="anuladdPhoto" class="btn_btn">Annuler</button>
		    			</div>
		    		</form>
		    	</div>
	   		</div>
	    	<?php
	    	echo "<div><button id=\"addVideo\" class=\"btn_btn\">Ajouter une Video</button>";
	    	?>
	    			<p id="validVideoUpload">Video ajoutée</p>
			    	<div id="divAddVideo" >
			    		<span id="add_msgError_v"></span>
			    	<form id="formAddVideo" method="post" action="?=t_e_video_vid/add"> 
			    		<label class="lblInscript">Ajouter une url</label>
		    			<input id="iptAdd2" name="vid_url" class="iptInscript" /> 
		    			<input type="hidden" name="jeu_id" value="<?php echo $data->jeu_id; ?>" /> 
		    			<div>
		    				<input id="iptSubAdd2" type="submit" value="Enregister" class="btn_btn" />
		    				<button type="button" id="anuladdVideo" class="btn_btn">Annuler</button>
		    			</div>
			    	</form>
		    	</div>
	  	    </div>
	    	<?php
	    	
	    }
}



