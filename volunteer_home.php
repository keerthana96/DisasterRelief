<!DOCTYPE html>
<html>
<head>
	<title>Volunteer Home</title>
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
  
  i=0;
  
  while(states[i])
  { 
    var pos = new google.maps.LatLng(states[i][0],states[i][1]);
    var marker=new google.maps.Marker({
     position:pos,
     });

  marker.setMap(map);

  google.maps.event.addListener(marker,'click',function() {
  getpos=marker.getPosition();

   geocoder.geocode({'location': getpos}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        
        var state = results[1].address_components[2]['long_name'].replace(/ /g,'');

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            window.location = "volunteer_login.html";
          }
        };
        xhttp.open("GET", "store_state.php?state="+state, true);
        xhttp.send();

      } else {
        alert('No results found');
      }
    } else {
      alert('Geocoder failed due to: ' + status);
    }
  });

  // alert(getpos);
  });
  i++;
  } 

  
}
google.maps.event.addDomListener(window, 'load', initialize);

    

  

  // google.maps.event.addListener(map, 'click', function(event) {
  //   codeLatLng(event.latLng);
  // });

// function placeMarker(location) {
//   var marker = new google.maps.Marker({
//     position: location,
//     map: map,
//   });
//   // var infowindow = new google.maps.InfoWindow({
//   //   content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
//   // });
//   // infowindow.open(map,marker);
// }

// function codeLatLng(markerPos) {
//   geocoder.geocode({'latLng': markerPos}, function(results, status) {
//     if (status == google.maps.GeocoderStatus.OK) 
//     {
//       var markerAddress = results[0].address_components[0].long_name
//           + ' (type: ' + results[0].address_components[0].types[0] + ')';
//       alert(markerAddress);
//     }
//   });
// }
 -->
</script>
</head>
<body>
	 <div id="googleMap" style="width:600px;height:600px;"></div>
</body>
</html>