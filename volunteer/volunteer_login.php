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
    background-image: url("../two.jpg");
    background-repeat: no-repeat;
    background-

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
	<script type="text/javascript">
	function showpwd(obj)
	{
		if(obj.checked)
			document.getElementById("password").type='text';
		else
			document.getElementById("password").type='password';
	}
  function submitform()
	{
		username = document.getElementById("username").value;
		password = document.getElementById("password").value;
		// alert(username+' '+password);
		$.ajax({
			  method: "POST",
			  url: "volunteer_auth.php",
			  data: { username :username,
			  password :password },
			  success: function(){alert("hi")},
				 error: function(){
				   alert('failure');
				 }
		}).done(function( check ) {
			    // modalInject($.parseJSON(msg));
			    alert("hi");
			    alert(check);
			    if(check==1)
			    	window.location = "volunteer_area.php";
				else
					window.location = "volunteer_login.php";
		});
	}
	</script>
</head>
<body>
  <?php require('../header.php'); ?>
  <main>
    <div class="row">
  <form class="col s6 right" id="login" method="POST" action="volunteer_auth.php">
    <div class="row">
      <div class="input-field col s6" style:"color:white;text-style:bold;">
        <input name="username" type="text" class="white-text validate" required>
        <label for="username">User Name</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input name="password" type="password" class="validate" required>
        <label for="password">Password</label>
      </div>
    </div>
      <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
      </button>
  </form>
</div>
</main>

<?php require('../footer.php'); ?>
<!-- <h3>Login</h3>
<form id="login" method="POST" action="volunteer_auth.php">
	<table>
		<tr>
			<span>
				<td>
					Username:
				</td>
				<td>
					<input id="username" type="text" name="username" required>
				</td>
			</span>
		</tr>
		<tr>
			<span>
				<td>
					Password:
				</td>
				<td>
					<input id="password" type="password" name="password" required>

				</td>
			</span>
		</tr>
	</table>
	<input type="checkbox" name="checkbox" id="showpass" unchecked onclick="showpwd(this);">Show password
	<br><br>
	<button type="submit" name="submit">Submit</button>
	<!--<p id="errormsg"><?php //echo $errormsg?></p>-->
</body>
</html>
