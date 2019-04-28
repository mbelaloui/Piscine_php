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
        foreach ($argv as $elem)
        {
            if ($elem != $argv[0])
            {
                $e = array(trim($elem));
                $temp = array_merge($temp, $e);
            }
        }
        return ($temp);
    }

    function do_op($a, $op, $b)
    {
        switch ($op)
        {
            case "+" : return ($a + $b);
            case "-" : return ($a - $b);
            case "*" : return ($a * $b);
            case "/" : return ($a / $b);
            case "%" : return ($a % $b);
            default : echo "error";
        }
    }

    if ($argc == 4)
    {
        $temp = get_param($argv);
        $resultat = do_op($temp[0],$temp[1],$temp[2]);
        echo "$resultat\n";
    }
    else
        echo "Incorrect Parameters\n";
?>
