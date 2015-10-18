jQuery(document).ready(function(){
	$(".lightbox").hide();
	$(".photo_Jv_View").click(function(){

		var recupId = $(this).attr("id");
		if($("#divlbx"+recupId).css('display')=="block")
		{
			$(".lightbox").hide();
			$(".photo_Jv_lb").hide();
		}else{
			$("#divlbx"+recupId).show();
			$(".photo_Jv_lb").show();
		}
		
		
		$("#divlbx"+recupId).click(function(){
			$(".lightbox").hide();


	});
    
	});
	
	
});