jQuery(document).ready(function(){
function updateClient () {
			$('#formupdate').submit(function(){
		$.ajax({
				type:"POST",
				url : "?r=t_e_client_cli/view",
				data : $('#formupdate').serialize(),
				success : function(msg) {
				
				refresh();
				//je sais pas pourquoi mais j'ai la vague impression d'avoir violenté le concept d'Ajax là :(
				location.reload();
				}
			});
		});

}
	$('#formupdate').on( "submit", function( event ) {
		  event.preventDefault();
		  console.log( $('#formupdate').serialize() );
		});
	$('.mdp_class').hide();

	$('#modif_info_form').click(function(){
		//contrôle js update
		// $('#msgModif').clear();
		var toutOK = true;
		var partternfixe = /^0[1-58][0-9]{8}$/;
		var pattern = /[\[\]* + ? | { } () ^ ." <> ! $ ; : § , ¨ & ~ \\\ \/ @ = ]/;
		var mail_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		var pattern_nom = /[0-9\[\]* + ? | { } () ^ ." <> ! $ ; : § , ¨ & ~ \\\ \/ @ = ]/;
		var patterpor = /^0[67][0-9]{8}$/;
		var pseudo_update = $("[name$='pseudo_update']").val();
		var nom_update = $("[name$='nom_update']").val();
		var prenom_update = $("[name$='prenom_update']").val();
		var mail_update = $("[name$='mail_update']").val();
		var telfixe_update = $("[name$='telfixe_update']").val();
		var telpor_update = $("[name$='telpor_update']").val();
		var mdp_update =  $("[name$='mdp_update']").val();
		var mdp_confirm_update = $("[name$='mdp_confirm_update']").val();
		$('#msgModif').remove();
		$('#info_client').append("<span id ='msgModif'></span>");
		var spanmsg = $('#msgModif');
		console.log(mdp_confirm_update); 
		if(pseudo_update=='')
		{
			spanmsg.append("<p>Le champ Pseudo est vide</p>");
			toutOK=false;

		}
		else if(pattern.test(pseudo_update)==true)
		{
			spanmsg.append("<p>Caractères spéciaux interdits dans le champ Pseudo</p>");toutOK=false;
		}
		for(var i=0;i<tabpseudo.length;i++)
		{
			if(pseudo_update==tabpseudo[i].cli_pseudo)
				{
					if(tabpseudo[i].cli_pseudo!=currentpseudo)
					{
						spanmsg.append("<p>Ce pseudo est déjà utilisée</p>");toutOK=false;
						break;
					}
				}
		}
		if(nom_update=='')
		{
			spanmsg.append("<p>Le champ Nom est vide</p>");toutOK=false;
		}
		else if(pattern_nom.test(nom_update)==true)
		{
			spanmsg.append("<p>Veuillez rentrer un nom valide</p>");toutOK=false;
		}
		if(prenom_update=='')
		{
			spanmsg.append("<p>Le champ Prénom est vide</p>");toutOK=false;
		}
		else if(pattern_nom.test(prenom_update)==true)
		{
			spanmsg.append("<p>Veuillez rentrer un prenom valide</p>");toutOK=false;
		}
		if(mail_update=='')
		{
			spanmsg.append("<p>Le champ Adresse email est vide</p>");toutOK=false;
		}
		else if(mail_pattern.test(mail_update)==false)
		{
			spanmsg.append("<p>Le format de l'adresse mail est invalide</p>");toutOK=false;
		}
		for(var i=0;i<tabmail.length;i++)
		{
			if(mail_update==tabmail[i].cli_mel)
				{
					if(tabmail[i].cli_mel!=currentmail)
					{
						spanmsg.append("<p>Cette adresse mail est déjà utilisée</p>");toutOK=false;
						break;
					}
				}
		}
		
		

		if(telfixe_update=='' && telpor_update=='')
		{
			spanmsg.append("<p>Vous devez renseigner au moins un numéro</p>");toutOK=false;
		}
		else if(partternfixe.test(telfixe_update)==false)
		{
			if(telfixe_update!='')
			{
			spanmsg.append("<p>Format téléphone fixe invalide</p>");toutOK=false;
			}
		}

		else if(patterpor.test(telpor_update)==false)
		{
			if(telpor_update!='')
			{
			spanmsg.append("<p>Format téléphone portable invalide</p>");toutOK=false;
			}
		}
		
		if(pattern.test(mdp_update)==true)
		{
			spanmsg.append("<p>Caractères spéciaux interdits dans le champ Mot de passe</p>");toutOK=false;
		}
		if(mdp_update!='')
		{
		if( mdp_update.length<8 || mdp_update.length>15)
		{
			spanmsg.append("<p>Le mot de passe doit contenir entre 8 et 15 caractères alphanumériques</p>");toutOK=false;
		}
		if(mdp_update!=mdp_confirm_update)
		{
			spanmsg.append("<p>Le mot de passe et la confirmation ne correspondent pas</p>");toutOK=false;
		}
		}
		$('#msgModif p').each(function(i,element){
			$('#msgModif p').eq(i).addClass("msgErreur");
		});





		if(toutOK==true) {
			updateClient();
		}






	

	});

	$("#profil").prepend('<img id="imageprofil" src="image/connecter logo.png"/>');
	$("#m_inscrire").prepend('<img id="imageprofil" src="image/connecter logo.png"/>');
	$('.input_info').hide();
	$('.info_hide').show();
	$('#modif_info_form').hide();
	$('#annuler_modif').hide();
	$('#modif_info').click(function(){
		$('#modif_info_form').show();
		$('.mdp_class').show();
		$('#annuler_modif').show();
		$('#modif_info').hide();
		$('#info_client p').each(function(i,element){
			 $('.input_info').eq(i).show();  
			 $('.info_hide').eq(i).hide();



			});
		$('#modif_info_form').attr('type','submit');
		$('#modif_info_form').html('Enregistrer les modifications');

	});
	$('#annuler_modif').click(function(){
		$('#modif_info_form').hide();
		$('#msgModif').hide();
		$('.mdp_class').hide();
		$('#modif_info').show();
		$(this).hide();
		$('#info_client p').each(function(i,element){
			 $('.input_info').eq(i).hide();  
			 $('.info_hide').eq(i).show();              


			});

		$('#modif_info').html('Modifier');
		$('#modif_info_form').attr('type','submit');
	});


});

