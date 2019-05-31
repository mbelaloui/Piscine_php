<?php

	$url_file = "list.csv";
	$lines = file($url_file );
	$tab = [];
	$id = 0;
	foreach ($lines as $l)
	{
		$temp = explode( ";", strval($l));
		$id = $temp[0];
	}
	$id++;
	echo "$id;$_GET[task]";
	$file = fopen("list.csv", "a+");
	$todo = array($id, $_GET['task']);
	fputcsv($file, $todo, ";");
?>