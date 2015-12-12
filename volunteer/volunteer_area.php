<?php
session_start();


?>

<html>
<p> Hi <?php echo $_SESSION['username']; ?>!</p>
<p> You live in <?php echo $_SESSION['city']; ?>!</p>

 












<?php 
session_start();
$_SESSION['area'] = "one";
?>
<p> The area you chose is <?php echo $_SESSION['area']; ?> </p>

<a href="volunteer_area_part2.php"><button> Go Ahead </button></a>


</html>