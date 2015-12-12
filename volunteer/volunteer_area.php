<?php
session_start();
?>

<html>
<head>
  <title>Volunteer Home</title>
  <script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
	function initialize() {
	
	  city = "<?php echo $_SESSION['city']; ?>";
	  var lat;
	  var lng;
	  var geocoder = new google.maps.Geocoder;
	  //results[0].address_components[3][\'long_name\']
	  geocoder.geocode({'address': city}, function(results, status) {
	    if (status === google.maps.GeocoderStatus.OK) {
	      if (results[0]) {
	        
	        lat = results[0].geometry.location.lat();
	        lng = results[0].geometry.location.lng();
	        // alert(lat+" "+lng);
	        // alert(lat+" "+lng);
			  // results[0].address_components[3]['long_name'] = city;

			  var center = new google.maps.LatLng(lat,lng);
			  
			  // var center = new google.maps.LatLng(20.593684,78.962880);
			  
			  var mapProp = {
			    center: center,
			    zoom:11,
			    mapTypeId:google.maps.MapTypeId.HYBRID
			  };
			  
			  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

			  areas = [[lat,lng]]; //get lat and lng af all major areas of the city and store in array areas
			  
			  i=0;
			  
			  while(areas[i])
			  { 
			    var pos = new google.maps.LatLng(areas[i][0],areas[i][1]);
			    var marker=new google.maps.Marker({
			     position:pos,
			     });

			  marker.setMap(map);

			  google.maps.event.addListener(marker,'click',function() {
			  getpos=marker.getPosition();

			   geocoder.geocode({'location': getpos}, function(results, status) {
			    if (status === google.maps.GeocoderStatus.OK) {
			      if (results[1]) {
			        
			        var area = results[1].address_components[1]['long_name'].replace(/ /g,'');
			        alert(area);

			        var xhttp = new XMLHttpRequest();
			        xhttp.onreadystatechange = function() {
			          if (xhttp.readyState == 4 && xhttp.status == 200) {
			            window.location = "volunteer_area_part2.php";
			          }
			        };
			        xhttp.open("GET", "store_area.php?area="+area, true);
			        xhttp.send();

			      } else {
			        alert('No results found');
			      }
			    } 
			    else {
			    alert('Geocoder failed due to: ' + status);
			    }
			  });

			  // alert(getpos);
			  });
			  i++;
			  } 
			}
	      else {
	      alert('No results found');
	      }
	    } else {
	      alert('Geocoder failed due to: ' + status);
	    }
	  });
	}

	google.maps.event.addDomListener(window, 'load', initialize);

	</script>
</head>
<body>
	<p> Hi <?php echo $_SESSION['username']; ?>!</p>
	<p> Your state is <?php echo "TamilNadu";//echo $_SESSION['state']; ?>!</p>
	<p> You live in <?php echo $_SESSION['city']; ?>!</p>
    <div id="googleMap" style="width:600px;height:600px;"></div>
    <!--<a href="volunteer_area_part2.php"><button> Go Ahead </button></a>-->
</body>
</html>
