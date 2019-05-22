#!/usr/bin/php
<?php

date_default_timezone_set('Europe/Paris');
$fd = fopen("/var/run/utmpx", "rb");
while ($file = fread($fd, 628))
{
	$f = unpack("a256ut_user/a32ut_id/a4ut_line/iut_pid/iut_type/I2ut_tv/a256ut_host/i16", $file);
	if ($f['ut_type'] == 7)
	{
		echo ($f['ut_user']." ");
		$ut_id = preg_replace("/\/+/", "", $f['ut_id']);
		if (preg_match("/ttys/", $ut_id))
			$ut_id = stristr($ut_id, 'ttys');   
		echo ($ut_id."  ");
		$time = $f['ut_tv1'];
		echo date('M j H:i', $time);
		echo "\n";
	}
}
?>
