

$(document).ready(function(){

    // $(function() {
    //   var ismap = $(this).attr('value');
    //   console.log(ismap);
    //   if(ismap !="map" )
    //   {
    //     $('.ismapimage').bootstrapToggle({
    //         on: 'Image',
    //         off: 'Map'
    //     });
    // }else {
    //   $('.ismapimage').bootstrapToggle({
    //     on: 'Map',
    //     off: 'Image'
    //   });
    //
    // }
    // })
  $(".updatemenu").on('submit',(function(e) {
		console.log('asa');
		e.preventDefault();
		$.ajax({
        	url: "updatemenu.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
			  {
					alert("data save" +data);
		    },
		  	error: function()
	    	{
	    	}
	   });
	}));

  // $("#toggle-two").on('click', function(){
  //   console.log("asdsad");
  //  var f;
  //  if($(this).attr("data-on")) {
  //      f=1;
  //  } else {
  //      f=2;
  //  }

  $(".toggle").click(function() {
var f;
var map= $('#ismap').val();
if(map =="map")
{
  if($(this).hasClass("off")){
     f = 2;
  }
  else{
    f=1;
  }
}else {
  if($(this).hasClass("off")){
     f = 1;
  }
  else{
    f=2;
  }
}

   console.log(map);

   $.ajax({
     type: "POST",
     url: "ismap.php",

     data: {'f':f},
     success: function(xml) {
         alert('Data Save.' +xml);
     }
         });
     });


});

					$('.btn-toggle').click(function() {
    $(this).find('.btn').toggleClass('active');

    if ($(this).find('.btn-primary').size()>0) {
    	$(this).find('.btn').toggleClass('btn-primary');
    }
    if ($(this).find('.btn-danger').size()>0) {
    	$(this).find('.btn').toggleClass('btn-danger');
    }
    if ($(this).find('.btn-success').size()>0) {
    	$(this).find('.btn').toggleClass('btn-success');
    }
    if ($(this).find('.btn-info').size()>0) {
    	$(this).find('.btn').toggleClass('btn-info');
    }

    $(this).find('.btn').toggleClass('btn-default');

});

// $('form').submit(function(){
// 	alert($(this["options"]).val());
//     return false;
// });
