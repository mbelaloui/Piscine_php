<?php

    function creat_file ($dir, $file)
    {
        if (!file_exists($dir))
            mkdir($dir);
        if (!file_exists($file))
            file_put_contents($file, null, FILE_APPEND);
    }

    function put_file($url_file)
    {
        echo "<br />/************  affichage du fichier ".$url_file." *****************/ ";
        if (!file_exists($url_file))
        {
            echo "<br>Le fichier ".$url_file." n'existe pas.";
//                    echo "ERROR\n";
        }
        else
        {
            echo "<br>Le fichier existe.";
            if (($data = file_get_contents($url_file)) === false)
            {
                echo "<br>erreur lecture du fichier ".$url_file."<br>";
//                    echo "ERROR\n";
            }
            else
            {
                echo "<br>Lecture du fichier.";
                $file = unserialize($data);
                if (empty($file))
                {
                    echo "<br />Fichier ".$url_file." est vide";
//                    echo "ERROR\n";
                }
                else
                {
                    echo "<br>affichage de file<br />";
                    print_r($file);
                    echo "<br>fin<br />";

                    $i = 0;
                    foreach ($file as $elem)
                    {
                        echo "<br>$i<br />";
                        print_r($elem);
                        echo "<br>";
                        $i++;
                    }
                }
            }
            echo "<br />/*****************************/<br/><br />";
        }
    }

    function is_login_existe($login, $file)
    {
        if ($file == "")
            return false;
        foreach ($file as $elem)
        {
            if ($elem["login"] == $login)
                return true;
        }
        return false;
    }

    function add_compt($url_file, $login, $passwd)
    {
        //struct    [[key=>val;key=>val],[key=>val;key=>val],[key=>val;key=>val],....]
        $elem = array
            (   
                "login" => $login,
                "passwd" => $passwd/// hache la passe
            );
        if (($data = file_get_contents($url_file)) === false)
        {
//            echo "<br>222 erreur lecture du fichier ".$url_file."<br>";
            return false;
        }
        else
        {
            $file = unserialize($data);
            
            /// voir si le login exite deja return false
            if (is_login_existe($login, $file))
                return false;

            $file[] = $elem;
//            print_r($file);
//            echo "<br>fin de la mise en forme<br />";
            $data = serialize($file);
            file_put_contents($url_file, $data);
//            echo "L'utilisateur ".$login." a ete ajouter au fichier";
            return true;
        }
        return false;
    }


    if ($_POST['login'] != "" && $_POST['passwd'] != "" && $_POST['submit'] == "OK")
    {
        $dir = "../private";
        $url_file = "../private/passwd";
//        put_file($url_file);
        creat_file ($dir, $url_file);
//        put_file($url_file);
        if (add_compt($url_file, $_POST['login'], hash("whirlpool", $_POST['passwd'])))
            echo "OK\n";
        else
            echo "EROOR\n";
//        put_file($url_file);
    }
    else
        echo "EROOR\n";
?>