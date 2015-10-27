jQuery(document).ready(function(){

	if($('#testLC').length){
		$("#divDelPanier").hide();
		$("#divAddPanier").show();
	}else{
		$("#divAddPanier").hide();
		$("#divDelPanier").show();
	}


	//gestion du formulaire d'ajout de lignes de commande
	$("#formAddPanier").submit(function(){
			$.ajax({
				type : "POST",
				dataType: "json",
				url : "?r=t_e_commande_com/addLigneCommande",
				data : $("#formAddPanier").serialize(),
				success : function(msg){
					
						console.log(msg);
					   if(msg['error']=="error"){
					       $("#divAddPanier").append("<span id='spanerror'>Erreur lors de l'ajout au panier</span>");
					   	   $("#spanerror").addClass("msgErreur");
					   }else{
								$("#msgNbArticles").remove();
								$("#btnpanier").append("<span id='msgNbArticles'> ("+msg['nbArticles']+")</span>");
								$("#divAddPanier").hide();
								$("#divDelPanier").show();
								

					   }
					
				}
				
			}); 
			return false;

	});
	//gestion du formulaire de suppression de lignes de commande

	$("#formDelPanier").submit(function(){
			$.ajax({
				type : "POST",
				dataType: "json",
				url : "?r=t_e_commande_com/delLigneCommande",
				data : $("#formDelPanier").serialize(),
				success : function(msg){
					
						console.log(msg);
					   if(msg['error']=="error"){
					       $("#divDelPanier").append("<span id='spanerror'>Erreur lors de la suppression</span>");
					   	   $("#spanerror").addClass("msgErreur");
					   }else{
								$("#msgNbArticles").remove();
								$("#btnpanier").append("<span id='msgNbArticles'> ("+msg['nbArticles']+")</span>");
								$("#divDelPanier").hide();
								$("#divAddPanier").show();
								
					   }
					
				}
				
			}); 
			return false;

	});

});

