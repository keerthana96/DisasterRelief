<!DOCTYPE html>
<html>
<head>
<style>
#req 
{
  width:600px;
  height:600px;
  display:inline-block;
  background:red;
  float:right;
}

</style>
  <title>User Home</title>
  <?php session_start(); ?>
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
  getpos = marker.getPosition();
  map.setCenter(getpos);
  marker.setMap(null);

  geocoder.geocode({'location': getpos}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        
        var city = results[1].address_components[1]['long_name'].replace(/ /g,'');

        // alert(city);

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            window.location = "what.php";
            // alert("ready");
            // arr = "<?php echo $_SESSION['city']; ?>";
            
            // alert(arr);
            //<?php
            // alert("<?php echo $_SESSION[\'city\'] ?>");
//         session_start();
//         require("../database/create_volunteer_table.php");
//         var_dump($_SESSION['city']);
// die();
//         // // $sqlur = "SELECT * FROM ReqInfo WHERE city=\"".$_SESSION['city']."\" ";
        // $sqlur = "SELECT requirement FROM ReqInfo WHERE city=\"Chennai\"";

        // $resu = mysqli_query($conn, $sqlur);
        // echo "<div id=\"req\"> </div>";

        // if (mysqli_num_rows($resu) > 0) {
           
        //     while($row = mysqli_fetch_assoc($resu)) 
        //     {
        //         $arr = explode(" ",$row['requirement']);
        //      echo "<table>";
        //      foreach($arr as $block)
        //      {
        //       $str = explode(":",$block);
        //       echo "<tr> <td>".$str[0]."</td><td>".$str[1]."</td></tr>"; 
        //      }
        //      echo "</table>";



        //     }
        // } else {
        //     echo "No Requirements";
        // }
//?>
          }
        };
        xhttp.open("GET", "user_city.php?cityname="+city, true);
        xhttp.send();

      } else {
        alert('No results found');
      }
    } else {
      alert('Geocoder failed due to: ' + status);
    }
  });

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
   <div id="googleMap" style="width:600px;height:600px;display: inline-block;"></div>
   <div id="req" style="width:600px;height:600px;background:red;display:none;"></div>
</body>
