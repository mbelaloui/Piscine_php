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
        if (is_numeric($a) && is_numeric($b))
        {
            switch ($op)
            {
                case "+" : return ($a + $b);
                case "-" : return ($a - $b);
                case "*" : return ($a * $b);
                case "/" : return ($a / $b);
                default : echo "Syntax Error";
            }
        }
        else
            echo "Syntax Error";
    }

    function is_space($c)
    {
        if ($c =="\v" || $c == "\t" || $c == " ")
            return true;
        return false;
    }

    function ft_split($str)
    {

        $first = true;
        $ret;
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
        $tab = explode(' ',$ret);
        return ($tab);
    }

    if ($argc == 2)
    {
        $temp = get_param($argv);
        $temp = ft_split($temp[0]);
        $resultat = do_op($temp[0],$temp[1],$temp[2]);
        echo "$resultat\n";
    }
    else
        echo "Incorrect Parameters\n";
?>