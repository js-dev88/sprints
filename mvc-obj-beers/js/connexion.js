jQuery(document).ready(function(){

	

	$("#formconnection").submit(function(){
		$.ajax({
			type : "POST",
			url : "?r=t_e_client_cli/formconnectaction",
			data : "connectionEmail="+$("#connectionEmail").val()+"&connectionMdp="+$("#connectionMdp").val(),
			success : function(msg){
				switch (msg) {
				    case '0': $("#msgError").html("<p>Format Mail invalide</p>");
				    	 break;
				    case '1': $("#connectFormdiv").html("<span id=\"confirmMsg\">Vous êtes maintenant connecté.</span>");
									$("#confirmMsg").append("<button id=\"fermformconnect\" class=\"btnconnect\">Fermer</button>");
									$("#fermformconnect").css('margin','35px').click(function(){
										$("#connectFormdiv").css('display','none');
										$("#btnconnection,#btninscription").css('display','none');
										$("#btnprofil").css({
										'display' : 'inline-block',
										'float' : 'right'
									});
							   });
									
									
				     	 break;
				    case '2': $("#msgError").html("<p>Mot de passe vide</p>");
				    	 break;
				    case '3': $("#msgError").html("<p>Mail vide</p>");
				    	 break;
				    case '4': $("#msgError").html("<p>Champs vides</p>");
				    	 break;
				    case '5': $("#msgError").html("<p>Mot de passe erroné</p>");
				    	 break;
				   	case '6': $("#msgError").html("<p>Mail erroné</p>");
				    	 break;
				}
			}
		}); 
		return false;
	});
});





	