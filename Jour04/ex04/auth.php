<?php
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

    function auth($login, $passwd)
    {
        $url_file = "../private/passwd";
        if (!file_exists($url_file) || ($data = read_file($url_file)) === false)
            return false;
        else
        {
            $file = unserialize($data);
            if ($file == "")
                return false;
            foreach ($file as $elem)
            {
                if ($elem["login"] == $login)
                    if ($elem["passwd"] == hash("whirlpool", $passwd))
                        return true;
                    else
                        return false;
            }
        }
        return false;
    }
?>