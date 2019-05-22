#!/usr/bin/php
<?php
    if ($argc == 2)
    {
        $html_file = file_get_contents($argv[1]);
        $html_file = preg_replace_callback('/<a (.{1,}) title=(.{1,})>(.{1,})</',function ($matches) {
            return "<a ".$matches[1]." title=".strtoupper($matches[2]).">".strtoupper($matches[3])."<";
        }, $html_file);
        
        $html_file = preg_replace_callback('/<a ([^<]{1,})>([^<]{1,})</',function ($matches) {
            return "<a ".$matches[1].">".strtoupper($matches[2])."<";
        }, $html_file);
        
        $html_file = preg_replace_callback('/<img (.{1,}) title=(.{1,})">/',function ($matches) {
            return "<img ".$matches[1]." title=".strtoupper($matches[2])."\">";
        }, $html_file);
        echo $html_file;
    }
?>