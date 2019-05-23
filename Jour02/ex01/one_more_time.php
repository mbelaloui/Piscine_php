#!/usr/bin/php
<?php
    function is_days_ok($day)
    {
        if (preg_match("/^(([Ll]undi)|([Mm]ardi)|([Mm]ercredi)|([Jj]eudi)|([Vv]endredi)|([Ss]amedi)|([Dd]imanche))$/", $day))
            return (true);
        return (false);
    }
    
    function is_num_days_ok($day)
    {
        if (preg_match("/^[0-9]{1,2}$/", $day))
            return (true);
        return (false);
    }

    function is_month_ok($day)
    {
        if (preg_match("/^(([Jj]anvier)|([Ff]évrier)|([Mm]ars)|([Aa]vril)|([Mm]ai)|([Jj]uin)|([Jj]uillet)|([Aa]oût)|([Ss]eptembre)|([Oo]ctobre)|([Nn]ovembre)|([Dd]écembre))$/", $day))
            return (true);
        return (false);
    }

    function is_year_ok($day)
    {
        if (preg_match("/^[0-9]{4}$/", $day))
            return (true);
        return (false);
    }

    function is_time_ok($day)
    {
        if (preg_match("/^[0-9]{2}:[0-9]{2}:[0-9]{2}$/", $day))
            return (true);
        return (false);
    }

    function get_num_month($month)
    {
        if (preg_match("/^[Jj]anvier$/", $month))
            return (1);
        if (preg_match("/^[Ff]évrier$/", $month))
            return (2);
        if (preg_match("/^[Mm]ars$/", $month))
            return (3);
        if (preg_match("/^[Aa]vril$/", $month))
            return (4);
        if (preg_match("/^[Mm]ai$/", $month))
            return (5);
        if (preg_match("/^[Jj]uin$/", $month))
            return (6);
        if (preg_match("/^[Jj]uillet$/", $month))
            return (7);
        if (preg_match("/^[Aa]oût$/", $month))
            return (8);
        if (preg_match("/^[Ss]eptembre$/", $month))
            return (9);
        if (preg_match("/^[Oo]ctobre$/", $month))
            return (10);
        if (preg_match("/^[Nn]ovembre$/", $month))
            return (11);
        if (preg_match("/^[Dd]écembre$/", $month))
            return (12);

    }
    date_default_timezone_set('Europe/Paris');

    if ($argc == 2)
    {
        $date = explode(" ", preg_replace("/[ \t]{1,}/", " ", trim($argv[1])));
        if (is_days_ok($date[0]))
            if (is_num_days_ok($date[1]))
                if (is_month_ok($date[2]))
                    if (is_year_ok($date[3]))
                        if (is_time_ok($date[4]))
                        {
                            $temp = explode(":", $date[4]);
                            echo mktime($temp[0],$temp[1] ,$temp[2], get_num_month($date[2]), $date[1], $date[3])."\n";
                        }
                        else
                            echo "Wrong Format\n";
                    else
                        echo "Wrong Format\n";
                else
                    echo "Wrong Format\n";
            else
                echo "Wrong Format\n";
        else
            echo "Wrong Format\n";
    }
?>