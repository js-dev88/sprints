jQuery(document).ready(function(){

	//bouton de connection du menu

	$("#btnconnection").click(function() {
		if ($("#connectFormdiv").css('display') == 'none'){
			$("#connectFormdiv").css('display','inline-block');
		}else{
			$("#connectFormdiv").css('display','none');
		}			
	});	
	
	
	
});