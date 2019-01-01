#!/usr/bin/php
<?php

    function pair($in)
    {
        echo "Le chiffre $in est Pair\n";
    }

    function impair($in)
    {
        echo "Le chiffre $in est Impair\n";
    }

    function notInt($in)
    {
        echo "'$in' n'est pas un chiffre\n";
    }

    echo "Entrez un nombre: ";
    while (($in = fgets(STDIN)))
    {
        $in = trim($in);
        if (is_numeric($in))
        {
            $in = intval($in);
            if ($in % 2)
                imPair($in);
            else
                pair($in);
        }
        else
            notInt($in);
        echo "Entrez un nombre: ";
    }
?>