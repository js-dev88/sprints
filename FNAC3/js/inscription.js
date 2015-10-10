jQuery(document).ready(function(){

$("#forminscriptionclient").submit(function() {
     $.ajax(	{
			type : "POST",
			url : "?r=t_e_client_cli/forminscriptionclient",
			data : $("#forminscriptionclient").serialize(),
			success : function(msg){
				switch (msg) {
				    case '0': $("#msgErrorInscription").html("<p>Vous devez choisir un type de Civilité</p>");
				    	 break;
				   
				    case '1': $("#msgErrorInscription").html("<p>Mot de passe vide</p>");

				    	 break;
				    case '2': $("#msgErrorInscription").html("<p>Mot de pass de confirmation vide</p>");
				    	 break;
				    case '3': $("#msgErrorInscription").html("<p>Les mots de passe doivent être identiques</p>");
				    	 break;
				    case '4': $("#msgErrorInscription").html("<p>Le mail est obligatoire</p>");
				    	 break;
				   	case '9': $("#msgErrorInscription").html("<p>Format de mail invalide</p>");
				    	 break;
					case '5': $("#msgErrorInscription").html("<p>Le mail de confirmation est obligatoire</p>");
				    	 break;
					case '10': $("#msgErrorInscription").html("<p>Format de mail de confirmation invalide</p>");
				    	 break;
					
					case '6': $("#msgErrorInscription").html("<p>Les mails doivent être identiques</p>");
				    	 break;
					
					case '7': $("#msgErrorInscription").html("<p>Le nom est obligatoire</p>");
				    	 break;
					
					case '8': $("#msgErrorInscription").html("<p>Le prénom est obligatoire</p>");
				    	 break;
						 
					case '11': $("#msgErrorInscription").html("<p>Le pseudo est obligatoire</p>");
				    	 break;
						 
					case 'Wtf, un bug inconnu !': $("#msgErrorInscription").html("<p>Une erreur est survenue, est-ce un complot pour vous obliger à découvrir le monde extérieur ?</p>");
				    	 break;
				}
			}
		}); 
		return false;
	});
	
	
});

