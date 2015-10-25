jQuery(document).ready(function(){

	affichemenu();

	//ajax du formulaire de connexion
	
	$("#formconnection").submit(function(){
		$.ajax(	{
			type : "POST",
			url : "?r=t_e_client_cli/formconnectaction",
			//"connectionEmail="+$("#connectionEmail").val()+"&connectionMdp="+$("#connectionMdp").val()
			data : $("#formconnection").serialize(),
			success : function(msg){
				switch (msg) {
				    case '0': $("#msgError").html("<p>Format Mail invalide</p>");
				    	 break;
				    case '1': 
										$("#connectFormdiv").css('display','none');
										$("#btnconnection,#btninscription").css('display','none');
										$("#btnprofil").css({
										'display' : 'inline-block',
										'float' : 'right'
									});		
									    $("#btnpanier").css({
										'display' : 'inline-block',
										'float' : 'left'
									});								
    							refresh();


				     	 break;
				    case '2': $("#msgError").html("<p>Mot de passe vide</p>");

				    	 break;
				    case '3': $("#msgError").html("<p>Mail vide</p>");
				    	 break;
				    case '4': $("#msgError").html("<p>Champs vides</p>");
				    	 break;
				    case '5': $("#msgError").html("<p>Mail ou Mot de passe erroné</p>");
				    	 break;
				   	case '6': $("#msgError").html("<p>Mail ou Mot de passe erroné</p>");
				    	 break;
				}
			}
		}); 
		return false;
	});



});

//gestion des boutons des menus en fonction de la connexion ou non de l'utilisateur
function affichemenu(){
	if($("#btndeconnection").css('display')=='block' )
	{
		

		$("#connectFormdiv").css('display','none');
			
			$("#btnconnection,#btninscription").hide();
	   
			$("#btnprofil").show();
			$("#btnpanier").show();
			$("#btnAbf").show();

		if($("#btnAbf").is(":visible")){
			$("#btnpanier").hide();
		}	
		 if($("#avisAbf").css('display')=='block'){
			 $("#btnAbf").hide();
		}	
	    if($("#panier").css('display')=='block'){
			 
			 $("#btnpanier").hide();
		}
	    if($("#profil").css('display')=='block'){
			 
			 $("#btnprofil").hide();
		}
	}
}
//refresh des éléments après la connexion
function refresh(){
$('#affichebtn').load('?r=site/index #affichebtn');
$('#pseudo').load('?r=site/index #pseudo'); 
}





	