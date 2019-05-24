<?php
    session_start();
    date_default_timezone_set("Europe/Paris");

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

    function creat_file ($dir, $file)
    {
        if (!file_exists($dir))
            mkdir($dir);
        if (!file_exists($file))
            file_put_contents($file, null, FILE_APPEND);
    }

    function send_msg($url_file, $login, $msg)
    {
        $elem = array
            (   
                "login" => $login,
                "time" => time(),
                "msg" => $msg,
            );
        if (($data = read_file($url_file)) === false)
            return false;
        else
        {
            $file = unserialize($data);
            $file[] = $elem;
            $data = serialize($file);
            write_file($url_file, $data);
            return true;
        }
        return false;
    }

    function do_job($log, $msg)
    {
        $dir = "../private";
        $url_file = "../private/chat";
        creat_file ($dir, $url_file);
        if (!send_msg($url_file, $log, $msg))
            echo "EROOR\n";
    }

    if ($_SESSION['loggued_on_user']!= "")
    {
        if (array_key_exists("submit",$_POST) && $_POST["submit"] == "OK")
            do_job($_SESSION['loggued_on_user'], $_POST["msg"]);
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
                <style>
                    #msg
                    {
                        width : 90%;
                    }

                    #submit_button
                    {
                        width : 9%;   
                    }
                </style>
            </head>
            <body>
                <form action="speak.php" method="post" id="form">
                    <input type="text" name="msg" id=msg />
                    <input type="submit" name="submit" id="submit_button" value="OK" />
                </form>
            </body>
        </html>
        <?php
    }
    else
        echo "ERROR\n"
?>
