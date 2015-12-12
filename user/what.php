<html>
<head>
	<title>Volunteer Login</title>
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
  </head>
  <body>
    <?php require('../header_user.php'); ?>
  <main>
<?php
session_start();
require("../database/create_volunteer_table.php");
// $sqlur = "SELECT * FROM ReqInfo WHERE city=\"".$_SESSION['city']."\" ";
$sqlur = "SELECT area, requirement FROM ReqInfo WHERE city=\"Chennai\"";

$resu = mysqli_query($conn, $sqlur);
//echo "<div id=\"req\"> </div>";

if (mysqli_num_rows($resu) > 0) {

    while($row = mysqli_fetch_assoc($resu))
    {
        $arr = explode(" ",$row['requirement']);
        $c = $row['area'];
		 echo "<div id=\"req\"><table class=\"striped centered\">
     <thead>
              <tr>
                  <th data-field=\"state\">StateName</th>
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
			echo "<tr><td>".$c."</td><td>".$str[0]."</td><td>".$str[1]."</td></tr>";
		 	}
		 }
		 echo "</tbody></table></div>";
    }
} else {
    echo "No Requirements";
}
?>
</main>
<?php require('../footer_user.php'); ?>
</body>
</html>
