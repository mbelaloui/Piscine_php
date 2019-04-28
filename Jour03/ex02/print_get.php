<?php
function print_tab($tab)
{
	foreach($tab as $key => $value)
	{
		echo "$key: $value\n";
	}
}
print_tab($_GET);
?>
