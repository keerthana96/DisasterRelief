<?php
require("../database/create_volunteer_table.php");
$sqldrop = "UPDATE ReqInfo SET requirement = NULL";
$conn->query($sqldrop);
?>