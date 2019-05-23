#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
$fd = fopen("/var/run/utmpx", "rb");
while ($file = fread($fd, 628))
{
	$ret = unpack("a256login/a32id/a4tty_name/ipid/itype_entry/I2time", $file);
	
	if ($ret['type_entry'] == 7)
	{
		$to_print = $ret['login'];
		$id = preg_replace("/^\/*/", "", $ret['id']);
		if (preg_match("/tty/", $id))
			$id = preg_replace_callback("/(.*)tty(.*)/",function ($matches) {
				return 'tty'.$matches[1];
			}, $id);
		$to_print .= " ".$id."  ";
		print($to_print.date('M j H:i', $ret['time1'])."\n");
	}
}
?>
