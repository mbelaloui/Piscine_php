#!/usr/bin/php
<?php
if ($argc == 2)
{
	if (count($arr = explode("+",$argv[1])) == 2)
	{
		if (is_numeric(trim($arr[0])) && is_numeric(trim($arr[1])))
			echo $arr[0]+$arr[1]."\n";
		else
			echo "Syntax Error\n";
	}else if (count($arr = explode("-",$argv[1])) == 2)
	{
		if (is_numeric(trim($arr[0])) && is_numeric(trim($arr[1])))
			echo $arr[0]-$arr[1]."\n";
		else
			echo "Syntax Error\n";
	}else if (count($arr = explode("*",$argv[1])) == 2)
	{
		if (is_numeric(trim($arr[0])) && is_numeric(trim($arr[1])))
			echo $arr[0]*$arr[1]."\n";
		else
			echo "Syntax Error\n";
	}else if (count($arr = explode("/",$argv[1])) == 2)
	{
		if (is_numeric(trim($arr[0])) && is_numeric(trim($arr[1])))
		{
			if ($arr[1] != 0)
				echo $arr[0]/$arr[1]."\n";
			else
				echo "INF\n";
		}else
			echo "Syntax Error\n";
	}else if (count($arr = explode("%",$argv[1])) == 2)
	{
		if (is_numeric(trim($arr[0])) && is_numeric(trim($arr[1])))
			echo $arr[0]%$arr[1]."\n";
		else
			echo "Syntax Error\n";
	}else
		echo "Incorrect Parameters\n";
}
else
	echo "Incorrect Parameters\n";
?>
