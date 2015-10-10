jQuery(document).ready(function(){
	$('#formupdate').on( "submit", function( event ) {
		  event.preventDefault();
		  console.log( $('#formupdate').serialize() );
		});
	$('#formupdate').submit(function(){
		$.ajax({
				type:"POST",
				url : "?r=t_e_client_cli/view",
				data : $('#formupdate').serialize(),
				success : function(msg) {
				$('#msgModif').html("<p>Informations enregistrées</p>");
				refresh();
				//je sais pas pourquoi mais j'ai la vague impression d'avoir violenté le concept d'Ajax là :(
				location.reload();
				}
		});
	});

	$('#modif_info_form').html('Enregistrer les modifications');
	$("#profil").prepend('<img id="imageprofil" src="image/connecter logo.png"/>');
	$("#m_inscrire").prepend('<img id="imageprofil" src="image/connecter logo.png"/>');
	$('.input_info').hide();
	$('.info_hide').show();
	$('#modif_info_form').hide();
	$('#annuler_modif').hide();
	
	$('#modif_info').click(function(){
		$('#modif_info_form').show();
		$('#annuler_modif').show();
		$('#modif_info').hide();
		$('#info_client p').each(function(i,element){
			 $('.input_info').eq(i).show();  
			 $('.info_hide').eq(i).hide();



			});
		$('#modif_info_form').attr('type','submit');   

	});
	$('#annuler_modif').click(function(){
		$('#modif_info_form').hide();
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

