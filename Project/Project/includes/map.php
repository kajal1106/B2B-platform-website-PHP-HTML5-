<section id="map-section">
				<div id="wrapper">
					<div id="map" style="height:625px;width:100%;border-radius:0.5%important;">


  </div>
				</div>
</section>

   <script>

var markers;

  function initMap() {
        var uluru = {lat: -20.5937, lng: 78.9629};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 2,
          center: uluru
        });


     var name;


               	$.ajax({
    	    
    	type: "POST",
    	url: "includes/mapco.php",
    	success: function(data){
               var city =   JSON.parse(data);
                console.log(city.length);

     var i = 0;

        while(i < city.length ){
                      console.log(city[i][1]);
                    name = city[i][0];
var geocoder= new google.maps.Geocoder();
               geocoder.geocode({
    'address':city[i][1]
  }, function(results, status) {
         console.log(status);
    if (status == google.maps.GeocoderStatus.OK) {
      var Lat1 = results[0].geometry.location.lat();
      var Lng1 = results[0].geometry.location.lng();
console.log(Lat1+'asdasdsadasfsdfdgfdgfdg');



             markers = new google.maps.Marker({
          position: {lat : Lat1 , lng : Lng1},
          Map: map,
          icon : 'images/pin.png'
        });
               var infoWindow = new google.maps.InfoWindow({
                     content:'<h3>'+name+'<h3>'

});

         markers.addListener('click',function(){

           infoWindow.open(map,marker);
 
});




         markers.push(marker);  




}
});
                  
            


    

            

  i++;
 

              
         }


var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
          
    	}

	});
      
 }
     
    </script>
 
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?v=3.30&key=AIzaSyCGmHWVJZ1SLSAsmvqaFuRxRmEB4hX8-J4&callback=initMap">
    </script>