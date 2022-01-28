<?php
$hostname = 'localhost';
$database = 'violetas';
$username = 'root';
$password = '';

$conexion = new mysqli($hostname,$username,$password,$database);
if ($conexion->connect_errno) {
  echo "Web site is getting trubles";
}
?>
