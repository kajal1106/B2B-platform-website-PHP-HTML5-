$('.child').each(function(){
	$(this).on('click',function(){
		var a= $(':nth-child(2)', this);
		console.log(a.text());
		//$('.filters').clone().html($(':nth-child(2)', this));
		$('.filters').empty();
	    $(':nth-child(2)', this).clone().prependTo($('.filters'));
		$('.filters .fil').show();
		
		
	});
	
	
});