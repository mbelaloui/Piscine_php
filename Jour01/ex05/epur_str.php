#!/usr/bin/php
<?php

function is_space($c)
{
	if ($c == " ")
		return true;
	return false;
}

function ft_split($str)
{
	$first = true;
	$ret = "";
	for ($i =0; $i < strlen($str); $i++)
	{
		if (!(is_space($str[$i])))
		{
			$first = false;
			$ret .= $str[$i];
		}
		else
		{
			while ($i < strlen($str) && (is_space($str[$i])))
				$i++;
			if ($i != strlen($str))
			{
				if (!$first)
					$ret .= " ";
				$ret .= $str[$i];
				$first = false;
			}
		}
	}
	return ($ret);
}

if($argc == 2)
{
	$arg = trim($argv[1]);
	if (!empty($arg))
		echo ft_split(trim($arg))."\n";
}
?>
