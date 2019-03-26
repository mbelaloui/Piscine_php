#!/usr/bin/php
<?php
    function print_tab($tab)
    {
        foreach ($tab as $elem)
            echo "$elem\n";
    }

    function get_param($argv)
    {
        $temp = array();
        for ($i = 2; $i < count($argv); $i++)
        {
            $tab = explode(':',trim($argv[$i]));
            $e = array($tab[0] => $tab[1]);
            $temp = array_merge($temp, $e);
        }
        return ($temp);
    }
        
    if ($argc > 2)
    {
        $key = $argv[1];
		$temp = get_param($argv);
        echo "$temp[$key]";
		if (!empty($temp[$key]))
        	echo "\n";
    }
?>
