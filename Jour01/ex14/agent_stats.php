#!/usr/bin/php
<?php

    function get_moyenne($file)
    {
        $somme = 0;
        $cp = 0;
        foreach ($file as $in)
        {
            $in = trim($in);
            $tab = explode(';',trim($in));
            if (($tab[2] != "moulinette") && is_numeric($tab[1]))
            {
                $somme += $tab[1];
                $cp++;
            }
        }
        $moyenne = $somme/$cp;
        echo "$moyenne\n";
    }

    function get_moyenne_user($file)
    {
        sort($file);

        $pt = 1;
        $max = count($file);
        while ($pt < $max)
        {
            $somme = 0;
            $cp = 0;
            $tab = explode(';',trim($file[$pt]));
            $name = $tab[0];
            while (($name == $tab[0]) && ($pt< $max))
            {
                $tab = explode(';',trim($file[$pt]));
                if ($name != $tab[0])
                {
                    echo "$name:$moyenne\n";
                    break;
                }
                if (is_numeric($tab[1]) && ($tab[2] != "moulinette"))
                {
                    $somme += $tab[1];
                    $cp++;
                    $moyenne = $somme/$cp;
                }
                $pt++;
            }
        }
        $moyenne = $somme/$cp;
        echo "$name:$moyenne\n";
    }

    function get_ecart_moulinette($file)
    {
        sort($file);

        $pt = 1;
        $max = count($file);
        while ($pt < $max)
        {
            $somme = 0;
            $cp = 0;
            $tab = explode(';',trim($file[$pt]));
            $name = $tab[0];
            while (($name == $tab[0]) && ($pt< $max))
            {
                $tab = explode(';',trim($file[$pt]));
                if ($name != $tab[0])
                {
                    $result = $moyenne - $moulinette;
                    echo "$name:$result\n";

                    break;
                }
                if (is_numeric($tab[1]) && ($tab[2] != "moulinette"))
                {
                    $somme += $tab[1];
                    $cp++;
                    $moyenne = $somme/$cp;
                }
                else if (($tab[2] == "moulinette"))
                {
                    $moulinette = $tab[1];
                }
                $pt++;
            }
        }
        $moyenne = $somme/$cp;
        $result = $moyenne - $moulinette;
        echo "$name:$result\n";
    }

    $file = file('php://stdin');
    if ($argc == 2)
    {
        switch ($argv[1])
        {
            case "moyenne" :
                get_moyenne($file);
                break;
            case "moyenne_user" :
                get_moyenne_user($file);
                break;
            case "ecart_moulinette":
            {
                echo "ecart_moulinette\n";
                get_ecart_moulinette($file);
            }
        }
    }
?>