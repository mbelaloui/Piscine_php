<?php
    header('Location: index.html');

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

    function modif_pass($url_file, $login, $oldpass, $newpass)
    {
        if (!file_exists($url_file) || ($data = read_file($url_file)) === false)
            return false;
        else
        {
            $file = unserialize($data);
            if ($file == "")
                return false;
            foreach ($file as $key=>$elem)
            {
                if ($elem["login"] == $login)
                {
                    if ($elem["passwd"] == $oldpass)
                    {
                        $file[$key]["passwd"] = $newpass;
                        $data = serialize($file);
                        write_file($url_file, $data);
                        return true;
                    }
                    else
                        return false;
                }
            }
        }
        return false;
    }

    if ($_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'] != "" && $_POST['submit'] == "OK")
    {
        $url_file = "../private/passwd";
        if (modif_pass($url_file, $_POST['login'], hash("whirlpool", $_POST['oldpw']), hash("whirlpool", $_POST['newpw'])))
            echo "OK\n";
        else
        {
            header('Location: modif.html');
            echo "EROOR\n";
        }
    }
    else
        echo "EROOR\n";
?>