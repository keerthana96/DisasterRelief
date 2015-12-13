<html>
<head>
	<title>Update Requirements</title>
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

  #req {
    position: absolute;
    width: 40%;
    left: 30%;
    top: 35%;
  }

  #reqform {
    position: absolute;
    left: 30%;
    top: 10%;
  }

  #greetings {
    position: absolute;
    right:5%;
    top: 30%;
    font-size: 20px;
    text-align: center;
    color: #4db6ac;
  }

  li a.white-text {
    font-size: 23px;
  }

  </style>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
  <script type="text/javascript">


$(document).ready(function() {
        $('#button').click(function() {

         $.ajax({
          type: "POST",
          url: "drop.php"
        }).done(function() {
          // alert("dropped");
          // alert( "Data Saved: " + msg );
          location.reload();
        });

    });
      });
  </script>
</head>
<body>
  <?php require('../header.php'); ?>
<main>
<?php  session_start();?>
<?php
echo "
<div id=\"greetings\">
<p> Hi ".$_SESSION['username']."!</p>
<p>State: ".$_SESSION['state']."!</p>
<p> City: ".$_SESSION['city']."!</p>
<p> Area: ".$_SESSION['area']."! </p>

</div>";

require("../database/create_volunteer_table.php");

$sqlpr = "SELECT * FROM ReqInfo WHERE city=\"".$_SESSION['city']."\" AND area=\"".$_SESSION['area']."\"";
// var_dump($sqlpr);
// die();
$res2 = $conn->query($sqlpr);
$infor = mysqli_fetch_row($res2);
$req = $infor[3];
 $arr = explode(" ",$req);
 echo "<div id='req'><table class=\"striped centered\">
 <thead>
          <tr>
              <th data-field=\"id\">ItemName</th>
              <th data-field=\"name\">Quantity</th>
          </tr>
        </thead>
        <tbody>";



        if($arr){
 foreach($arr as $block)
 {
	$str = explode(":",$block);
	echo "<tr> <td>".$str[0]."</td><td>".$str[1]."</td></tr>";
 }
}
 echo "</tbody></table></div>";
?>
<form id="reqform"class="col s12 right" id="login" method="POST" action="update_info.php">
  <div class="row">
    <div class="input-field col s6">
      <input name="item" type="text" class="validate" required>
      <label for="item">Item</label>
    </div>
    <div class="input-field col s6">
      <input name="quantity" type="number" class="validate" required>
      <label for="quantity">Quantity</label>
    </div>
  </div>
    <button class="btn waves-effect waves-light" type="submit" name="submit"><i class="mdi-content-add"></i>
    </button>
    <button class="btn waves-effect waves-light" type="button" name="button" id="button"><i class="mdi-notification-sync"></i>
    </button>
</form>
<!-- <form id="login" method="POST" action="update_info.php">
	<table>
		<tr>
			<span>
				<td>
					Item:
				</td>
				<td>
					<input id="item" type="text" name="item" required>
				</td>
			</span>
		</tr>
		<tr>
			<span>
				<td>
					Quantity:
				</td>
				<td>
					<input id="quantity" type="number" name="quantity" required>

				</td>
			</span>
		</tr>
	</table>
	<input type="submit" name="submit" value="+">

</form> -->
</main>
<?php require('../footer.php'); ?>
</body>
</html>
