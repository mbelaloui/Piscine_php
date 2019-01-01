#!/usr/bin/php
<?php
    if ($argc == 2)
    {
        $result = preg_replace("# {1,}#", " ", $argv[1]);
        echo "$result\n";
    }
?>