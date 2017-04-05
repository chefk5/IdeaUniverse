<?php
$mysql_link=mysqli_connect("localhost","root","");
mysqli_select_db($mysql_link,"ideauniverse");
if (!$mysql_link) {
    die("Connection failed: " . mysqli_connect_error());
}


?>