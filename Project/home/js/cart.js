
	$('.push').each(function(){
		
		
		  

			  $(this).on('click',function(){
				  		
				  if($(this).hasClass( "activex" )){
					  	 console.log('have class');
				  var a = $(this).attr('id');
		
			    	$.ajax({
    	    
    	type: "POST",
    	url: "includes/rcart.php",
    	data:{'pid': a},
    	success: function(data){
    	      
       
         var b= parseInt($('.cart').text());

		 if((data.indexOf("2")) >= 0){
			  //console.log(data);
			// console.log('not removed'); 
			 
		 }
		 else {
	     b--;
		 //console.log('removed');
		 //console.log(a);
		 $('#'+a).removeClass('activex');
		 $('.cart').text(b);
		 }
    	}

    	});
		
			//console.log(a);	
		}
		
				  else {
			  //console.log('does not');
			  
		
			var a = $(this).attr('id');
			    	$.ajax({
    	    
    	type: "POST",
    	url: "includes/cart.php",
    	data:{'pid': a},
    	success: function(data){
    	      
        //console.log(data);
         var b= parseInt($('.cart').text());

		 if((data.indexOf("2")) >= 0){
			 console.log('already added'); 
		 }
		 else {
	     b++;
		 $('.cart').text(b);
		 $("#"+a).addClass('activex');
		 //console.log('added'); 
		 
		 }
    	}

    	});
		
			//console.log(a);	
		}
		  
		
			  
		  
		  

		
	});
	
	});
	
	
	
	
