<?php

include 'db.php';

if(isset($_GET['alias'])){

	$alias = htmlspecialchars($_GET['alias']);

	$delete = 'DELETE FROM urls WHERE alias = ? LIMIT 1';

	$statement = $conn -> prepare($delete);
	$statement -> bind_param('s',$alias);

	if ($statement -> execute()) {

		header('location: url_shortener.php');

	}

}
