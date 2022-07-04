<?php

include 'db.php';

function nameCreator($limit) {

	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	$arr = str_split($characters);
	$n = 0;
	$name = '';

	while ($n <= $limit) {
				
		$x = rand(0,(strlen($characters) - 1));
		$name .= $arr[$x];
		$n++;

	}

	return $name;

}

if (isset($_POST['create'])) {

    $urllen = 7;
	
	$url = filter_var(htmlspecialchars($_POST['url']), FILTER_SANITIZE_URL);
	$alias = nameCreator($urllen - 1);
	$created = time();
	$userip = $_SERVER['REMOTE_ADDR'];

	$select = 'SELECT alias FROM urls WHERE alias = ?';

	$statement = $conn -> prepare($select);
	$statement -> bind_param('s', $alias);
	$statement -> execute();
	$statement -> store_result();
	$result = $statement -> num_rows;

	if ($result === 0) {

		$insert = 'INSERT INTO urls(longurl, alias, created, userip) VALUES(?,?,?,?)';
		$statement = $conn -> prepare($insert);
		$statement -> bind_param('ssss', $url, $alias, $created, $userip);
		if($statement -> execute()){
			$report = 'success';
			$shareurl = 'https://'.$_SERVER['HTTP_HOST'].'/url-shortener/'.$alias;
			// WITHOUT SUB-FOLDER
			//$shareurl = 'https://'.$_SERVER['HTTP_HOST'].'/'.$alias;
		}

	}

}
