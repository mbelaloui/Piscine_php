<?php
	
	$fichier = file("/var/run/utmp");
	echo "bonjour\n";
	print_r($fichier);
	foreach $i : $fichier
	{
		print($i)
	}

?>
