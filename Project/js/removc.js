$('.remov').each(function(){
	$(this).on('click',function(){
		console.log($(this).attr('id'));
		a = $(this).attr('id');
				$.ajax({
    	    
    	type: "POST",
    	url: "includes/rcart.php",
    	data:{'pid': a},
    	success: function(data){
    	      
       
         var b= parseInt($('.cart').text());

		 if((data.indexOf("2")) >= 0){
			  console.log(data);
			 console.log('not removed'); 
			 
		 }
		 else {
	     b--;
		 console.log('removed');
		 $("#"+a).removeClass('activex');
		 $('.cart').text(b);
		  $('#'+a).closest("tr").hide();
		 }
    	}

    	});
		
	});
	
	
	
});