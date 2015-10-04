

jQuery(document).ready(function(){

	
	$("#inscriptionbutton").click(function() {
		if ($("#inscription").css('display') != 'block')
		{
			$("#inscription").css('display','block');
		}
		else{
			$("#inscription").css('display','none');
		}
	
		
		
	});
	
});