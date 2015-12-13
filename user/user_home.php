<!DOCTYPE html>
<html>
<head>

 <link rel="stylesheet" type="text/css" href="../materialize/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="../materialize/css/materialize.css">
  <script src="http://code.angularjs.org/1.2.13/angular.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
  <style type="text/css">
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }

  #login {
    position:absolute;
    right: 5%;
    bottom: 40%;
  }

  li a.white-text {
    font-size: 23px;
  }
  </style>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
  <title>Home</title>
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
  document.getElementById("he").innerHTML="Click on the CITY which you would like to view relief information about.";

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
 <?php require('../header_user.php'); ?> <br><br>
  <main>
    <div class="row">
    <br><br>
   <div id="googleMap" style="width:600px;height:500px;display: inline-block;left:300px" ></div>
    <div id="info" style="width:400px;height:500px;display:inline-block;float:right;">
        <h4 style="color:#4db6ac;text-shadow: 2px 2px black;"> Relief Management
        </h4>
        <h6 id="he">Click on the STATE for which you would like to view relief information about. </h6>

        <p> Our Aim is to spread the relief supplies as uniformly as possible to <br>
        <ul> <li> 1. Ensure that all those who need the most have been provided with </li>
        <li> 2. To prevent wastage of supplies </li>
        </ul>
        Help those in need! :) <br>
        Spread the love ^_^ <br>

        </p>

    </div>
</div>
</main>
<?php require('../footer_user.php'); ?>
</body>
</html>
