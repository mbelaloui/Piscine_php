#!/usr/bin/php
<?php
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
        sort($tab);
        return ($tab);
    }

    for ($i = 1; $i < $argc; $i++)
    {
        $str .= $argv[$i];
        if ($i < $argc)
            $str .= " ";
    }
    $ret= ft_split($str);

    foreach ($ret as $elem)
    {
        echo "$elem\n";
    }
?>