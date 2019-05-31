<?php
	$url_file = "list.csv";
	$lines = file($url_file );
	$tab = [];
	$id = $_GET['id'];
	foreach ($lines as $l)
	{
		$temp = explode( ";", strval($l));
		if ($temp[0] !== $id)
			array_push($tab, $l);
	}
	file_put_contents($url_file, $tab);
?>