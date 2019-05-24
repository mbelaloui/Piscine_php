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
        if (!file_exists($url_file))
            echo "ERROR\n";
        else
        {
            if (($data = file_get_contents($url_file)) === false)
                echo "ERROR\n";
            else
            {
                $file = unserialize($data);
                if (empty($file))
                    echo "ERROR\n";
                else
                {
                    echo "<br />/*****************************/<br/><br />";
                    foreach ($file as $elem)
                    {
                        echo "<br>$i<br />";
                        print_r($elem);
                        echo "<br>";
                        $i++;
                    }
                    echo "<br />/*****************************/<br/><br />";
                }
            }
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

    function read_file($url_file)
    {
        if (!file_exists($url_file))
            return false;
        $fp = fopen($url_file, "r");
        if (flock($fp, LOCK_SH))
        {
            $ret = file_get_contents($url_file);
            flock($fp, LOCK_UN);
            return $ret;
        } else
            return false;
    }

    function write_file($url_file, $data)
    {
        if (!file_exists($url_file))
            return false;
        $fp = fopen($url_file, "a");
        if (flock($fp, LOCK_EX))
        {
            file_put_contents($url_file, $data);
            flock($fp, LOCK_UN);
            return true;
        } else
            return false;
    }

    function add_compt($url_file, $login, $passwd)
    {
        $elem = array
            (   
                "login" => $login,
                "passwd" => $passwd/// hache la passe
            );
        if (($data = read_file($url_file)) === false)
            return false;
        else
        {
            $file = unserialize($data);
            if (is_login_existe($login, $file))
                return false;
            $file[] = $elem;
            $data = serialize($file);
            write_file($url_file, $data);
            return true;
        }
        return false;
    }

    header('Location: index.html');
    
    if ($_POST['login'] != "" and $_POST['passwd'] != "" and $_POST['submit'] == "OK")
    {
        $dir = "../private";
        $url_file = "../private/passwd";
        creat_file ($dir, $url_file);
        if (add_compt($url_file, $_POST['login'], hash("whirlpool", $_POST['passwd'])))
            echo "OK\n";
        else
        {
            header('Location: create.html');
            echo "EROOR\n";
        }
    }
    else
        echo "EROOR\n";
?>