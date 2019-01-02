<?php

    function auth($login, $passwd)
    {
        $url_file = "../private/passwd";
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

/*    teste
**    $ret = auth($_POST['l'], $_POST['p']);
**    echo "ret ==> ".$ret;
*/

?>