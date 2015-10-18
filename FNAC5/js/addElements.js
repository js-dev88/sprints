jQuery(document).ready(function(){

	$("#addPhoto").click(function(){
		$("#validPhotoUpload").hide();
		$("#divAddPhoto").addClass("fadeInLeft animated").show();
		$("#anuladdPhoto").click(function(){
			$("#divAddPhoto").hide();
		});
	});

	

	$("#formAddPhoto").submit(function(){
		$.ajax({
			type : "POST",
			url : "?r=t_e_photo_pho/add",
			data : $("#formAddPhoto").serialize(),
			success : function(msg){
				switch (msg) {
				   case '1':    $("#divAddPhoto").hide();	
    							$("#validPhotoUpload").show();
    							location.reload();
				     	 break;
				    case '2': $("#add_msgError").html("<p>Champ url vide</p>");
				    	 break;
				    case '3': $("#add_msgError").html("<p>Erreur Soumission Formulaire</p>");
				    	 break;
				    case '4': $("#add_msgError").html("<p>Url déjà existante</p>");
				    	 break;
				    case '5': $("#add_msgError").html("<p>Format url invalide</p>");
				    	 break;
				}
			}
			
		}); 
		return false;

	});

	$("#addVideo").click(function(){
		$("#divAddVideo").addClass("fadeInLeft animated").show();
		$("#anuladdVideo").click(function(){
			$("#divAddVideo").hide();
		});
	});

	$("#formAddVideo").submit(function(){
		$.ajax({
			type : "POST",
			url : "?r=t_e_video_vid/add",
			data : $("#formAddVideo").serialize(),
			success : function(msg){
				switch (msg) {
				   case '1':    $("#divAddVideo").hide();	
    							$("#validVideoUpload").show();
    							location.reload();
				     	 break;
				    case '2': $("#add_msgError_v").html("<p>Champ url vide</p>");
				    	 break;
				    case '3': $("#add_msgError_v").html("<p>Erreur Soumission Formulaire</p>");
				    	 break;
				    case '4': $("#add_msgError_v").html("<p>Url déjà existante</p>");
				    	 break;
				    case '5': $("#add_msgError_v").html("<p>Format url invalide</p>");
				    	 break;
				}
			}
			
		}); 
		return false;

	});


});



