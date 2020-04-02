
 $(".ind").slice(0,5).show();
 var a=0;

$('.pop').on('click',function(){
	
	$(".ind").slice(0,5).show();
	
});
 
 
 $(document).on('click','.tog',function(){
	       
			 if(a==0){
				  
				 $(".ind").show();
				  $('.tog').text('Show Less');
			       a=1;	  
			 }
			 else {
				 $(".ind").hide();
				  $(".ind").slice(0,5).show();
				   a=0;	
				    $('.tog').text('Show All');
			 }
			 
	        
 });
 

 $(".ind_b").slice(0,5).show();
 var b=0;

 $(document).on('click','.tog_b',function(){
	     	  console.log('akhhjjh');
			 if(b==0){

				 $(".ind_b").show();
				  $('.tog_b').text('Show Less');
			       b=1;	  
			 }
			 else {
				 $(".ind_b").hide();
				  $(".ind_b").slice(0,5).show();
				   b=0;	
				    $('.tog_b').text('Show All');
			 }
			 
	        
 });



  $(".ind_si").slice(0,5).show();
 var si=0;

 $(document).on('click','.tog_si',function(){
	     	  console.log('akhhjjh');
			 if(si==0){
				   
				 $(".ind_si").show();
				  $('.tog_si').text('Show Less');
			       si=1;	  
			 }
			 else {
				 $(".ind_si").hide();
				  $(".ind_si").slice(0,5).show();
				   si=0;	
				    $('.tog_si').text('Show All');
			 }
			 
	        
 });
 