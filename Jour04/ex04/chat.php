<?php
    session_start();

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

    function get_data($url_file)
    {
        if (($data = read_file($url_file)) === false)
            return "";
        else
        {
            $file = unserialize($data);
            return $file;
        }
        return "";
    }

    function get_msg()
    {
        $url_file = "../private/chat";
        $ret = get_data($url_file);
        if ($ret == "")
            return array();
        return $ret;
    }

    if ($_SESSION['loggued_on_user']!= "")
    {
        $list_msg = get_msg();
        date_default_timezone_set ("Europe/Paris");
        foreach ($list_msg as $msg)
        {
            echo "[".date("H:i",$msg["time"])."] <b>".$msg["login"]."<b/>: ".$msg["msg"]."<br />\n";
        }
    }
?>