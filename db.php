<?php

$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'url_shortener';

$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

if (!$conn) {
	echo "Unable To Connect Database";
}
