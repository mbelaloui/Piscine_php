<?php
	switch ($_GET['action'])
	{
		case "get" :
		{
			if (isset($_COOKIE[$_GET["name"]]))
				echo $_COOKIE[$_GET["name"]];
			break;
		} 
		case "set" :
		{
			if (isset($_GET["value"]) && isset($_GET["name"]))
				setcookie($_GET["name"],$_GET["value"], time() + (86400 * 30), "/");
			break;
		}
		case "del" :
		{
			if (isset($_GET["name"]))
				setcookie($_GET["name"],"", time() - (86400 * 30));
			break;
		}
	}
?>