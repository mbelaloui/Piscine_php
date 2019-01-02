<?php

    function modif_pass($url_file, $login, $oldpass, $newpass)
    {
        if (!file_exists($url_file) || ($data = file_get_contents($url_file)) === false)
        {
//            echo "<br>222 erreur lecture du fichier ".$url_file."<br>";
            return false;
        }
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
                        file_put_contents($url_file, $data);
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
            echo "EROOR\n";
    }
    else
        echo "EROOR\n";
?>