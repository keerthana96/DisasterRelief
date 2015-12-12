<!DOCTYPE html>
<html>
<head>
  <title>User Home</title>
  <script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  
  var center = new google.maps.LatLng(20.593684,78.962880);
  
  var mapProp = {

    center: center,
    zoom:5,

    mapTypeId:google.maps.MapTypeId.HYBRID
  };
  
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  
  var geocoder = new google.maps.Geocoder;

  states = [[11.00,78.00]];
  cities = [[13.0827,80.2707]]; 

  i=0;
  
  while(states[i])
  { 
    var pos = new google.maps.LatLng(states[i][0],states[i][1]);
    var marker=new google.maps.Marker({
     position:pos,
     });

  marker.setMap(map);

  google.maps.event.addListener(marker,'click',function() {
  map.setZoom(7);
  map.setCenter(marker.getPosition());
  var citypos = new google.maps.LatLng(cities[0][0],cities[0][1]);
  marker.setPosition(citypos);

  google.maps.event.addListener(marker,'click',function() {
  map.setZoom(12);
  map.setCenter(marker.getPosition());
  marker.setMap(null);
  <?php
    //get city name
    //compare with reqinfo and display all reqs of all areas of the city in descending order in a div next to(or below) the map
  ?>
  });

  });
  i++;
  }
  
}
google.maps.event.addDomListener(window, 'load', initialize);

</script>
</head>
<body>
   <div id="googleMap" style="width:600px;height:600px;"></div>
</body>
</html>