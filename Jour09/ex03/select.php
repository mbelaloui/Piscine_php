<?php
	$array = array();
	$list = file('list.csv');
	foreach ($list as $lineNumber => $lineContent)
	{
		array_push($array, $lineContent);
	}
	echo json_encode($array);
?>