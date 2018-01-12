<?php
$db = new mysqli('localhost', 'root', 'enigmatech.dev','compareprice');

if (!$db){
	trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}
?>