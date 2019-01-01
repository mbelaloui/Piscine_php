#!/usr/bin/php
<?php
//   |[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi) [0-2]{1}[0-9]|3[01]{1}                    [0-2]{1}[0-9]|

/*

0[1-9]|[12][0-9]|3[01]
            ([Jj]anvier|[Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre) #"
            
*/
    if ($argc == 2)
    {
        echo "hellow\n";
//        if (preg_match("##", $argv[1]))
        if (preg_match("#^([Dd]imanche|[Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi)#", $argv[1]))
            echo "ok\n";
    }
    else
        echo "wallo\n";

?>