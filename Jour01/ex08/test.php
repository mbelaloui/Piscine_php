#!/usr/bin/php
<?php

    include("ft_is_sort.php");

    $tab = array("1", "2","3");

    if (ft_is_sort($tab))
        echo "Le tableu est trie\n";
    else
        echo "Le tableu n'est pas trie\n";

    $tab = array("1","3", "2");

    if (ft_is_sort($tab))
        echo "Le tableu est trie\n";
    else
        echo "Le tableu n'est pas trie\n";
?>