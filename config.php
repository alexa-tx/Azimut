<?php
$mysqli = new mysqli("localhost", "root", "", "Azimut");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
