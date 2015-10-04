jQuery(document).ready(function(){

	$("#btnconnection").click(function() {
		if ($(".ulformconnect").css('display') == 'none'){
			$(".ulformconnect").css('display','inline-block');
		}else{
			$(".ulformconnect").css('display','none');
		}			
	});	
	
		$("#btnconnection,#btninscription").css('display','none');
});