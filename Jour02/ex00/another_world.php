#!/usr/bin/php
<?php
    if ($argc == 2)
	    echo preg_replace("/[ \t]{1,}/", " ", trim($argv[1]))."\n";
?>