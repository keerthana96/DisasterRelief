
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

  li a.white-text {
      font-size: 30px;
  }

  #req {
    position: absolute;
    width: 60%;
    left: 30%;
    top: 20%;
  }
    </style>

</head>

<?php
session_start();
require("../database/create_volunteer_table.php");
$sql4 = "SELECT area FROM ReqInfo WHERE city=\"Chennai\"";
$resu4 = mysqli_query($conn, $sql4);

if (mysqli_num_rows($resu4) > 0) 
{
	
	echo "<ul id=\"list\">";
	while($row2 = mysqli_fetch_assoc($resu4))
    {
    		$c2 = $row2['area'];
    		echo "<li id=\"$c2\">".$c2."</li>";

    }
    echo "</ul>";

}


echo "<div style=\"display:none\">"; 
$sql3 = "SELECT requirement FROM ReqInfo WHERE city= \"Chennai\" and area = \"".$area."\"";

$resu3 = mysqli_query($conn, $sql3);
echo "<div id=\"req\">";

if (mysqli_num_rows($resu3) > 0) {

    while($row = mysqli_fetch_assoc($resu3))
    {
        $arr = explode(" ",$row['requirement']);
			if($row['requirement']!=NULL){
		 echo "<table class=\"striped centered\">
     <thead>
              <tr>
                  <th data-field=\"id\">ItemName</th>
                  <th data-field=\"name\">Quantity</th>
              </tr>
            </thead>
            <tbody>";

		 foreach($arr as $block)
		 {
			if($block!=NULL)
			{
			$str = explode(":",$block);
			echo "<tr><td>".$str[0]."</td><td>".$str[1]."</td></tr>";
		 	}
		 }
		 echo "</tbody></table>";
    }
	}
} else {
    echo "No Requirements";
}



echo "</div> </div>";

?>
<script type="text/javascript">
// alert("hi");
var oInput = document.getElementById('list'),
            oChild;
//alert(oInput.childNodes.length);
    for(i = 0; i < oInput.childNodes.length; i++){
    	
        oChild = oInput.childNodes[i];
        if(oChild.nodeName == 'LI'){
            // document.getElementById(oChild.id).onclick = function() {
            	alert(oChild.id); 

            // }
        }

    }
    // for(i=0;i<oInput.childNodes.length;i++){
    // 	document.getElementById(oInput.childNodes[i].id).onclick = function() {
    //         	alert(oChild.id); 
    // }
</script>
</html>