<?php

if(empty($_POST['username']))
{
    $this->HandleError("UserName is empty!");
    return false;
}

if(empty($_POST['password']))
{
    $this->HandleError("Password is empty!");
    return false;
}

$login_username = validate_input($_POST['username']);
$login_password = sha1(validate_input($_POST['password']));
session_start();
$login_state = $_SESSION['state'];
// var_dump($login_state);
// die();
// $login_state = 'TamilNadu';

$check=checkLogin($login_username,$login_password,$login_state);

if($check==1)
{
	header("Location: volunteer_area.php");
	die();
}
else
{
	// $errormsg = "Error logging in. Invalid username or password.";
	header("Location: volunteer_login.html");
	die();
}
// echo $check;
// echo $username." ".$password." ".$state." ";

function checkLogin($login_username,$login_password,$login_state)
{
	$auth = "SELECT * FROM ".$login_state." WHERE username = \"".$login_username."\" AND password = \"".$login_password."\"";
	// var_dump($auth);
	// die();
	require("create_volunteer_table.php");

	$result = $conn->query($auth);
 	// var_dump($result);
	// die();
    if(!$result || mysqli_num_rows($result) <= 0)
    {
    	// echo "<p>Error logging in. Invalid username or password.</p";
    	return false;
    }
    elseif ( mysqli_num_rows($result) == 1)
    {
    	session_start();
    	$_SESSION['username']=$username;
    	// echo "<p>Successfully logged in.</p>";
    	return true;
    }
    else
    {
    	return false;
    }
}

function validate_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>