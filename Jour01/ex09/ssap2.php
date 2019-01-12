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
        return ($tab);
    }

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
                $e = ft_split($elem);
                $temp = array_merge($temp, $e);
            }
        }
        return ($temp);
    }

    function extract_int($tab)
    {
        $temp = array();
        foreach ($tab as $elem)
        {
            if (is_numeric($elem))
            {
                $e = array($elem);
                $temp = array_merge($temp, $e);
            }
        }
        return ($temp);
    }

    function is_alpha($elem)
    {
        if (ctype_alnum ($elem) && !is_numeric($elem))
            return (true);
        return (false);
    }

    function extract_alpha($tab)
    {
        $temp = array();
        foreach ($tab as $elem)
        {
            if (is_alpha($elem))
            {
                $e = array($elem);
                $temp = array_merge($temp, $e);
            }
        }
        return ($temp);
    }

    function extract_ascii($tab)
    {
        $temp = array();
        foreach ($tab as $elem)
        {
            if (!is_alpha($elem) && !is_numeric($elem))
            {
                $e = array($elem);
                $temp = array_merge($temp, $e);
            }
        }
        return ($temp);
    }

    if ($argc > 1)
    {
        $temp = get_param($argv);

        $int_alpha = extract_alpha($temp);
        natcasesort($int_alpha);
        print_tab($int_alpha);

        $tab_int = extract_int($temp);
        rsort($tab_int);
        print_tab($tab_int);

        $int_ascii = extract_ascii($temp);
        sort($int_ascii);
        print_tab($int_ascii);

    }
?>