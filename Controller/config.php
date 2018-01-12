<?php
$db = new mysqli('localhost', 'root', '','compareprice');

if (!$db){
	trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}
?>
