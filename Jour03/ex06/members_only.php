<?php
    header("content-type: text/html");
    if (isset($_SERVER["PHP_AUTH_USER"]))
    {
        if ($_SERVER["PHP_AUTH_USER"] == "zaz" && $_SERVER["PHP_AUTH_PW"] == "jaimelespetitsponeys")
        {
            header('HTTP/1.1 200 OK');
            $img_file = "../img/42.png";
            $val_file = file_get_contents($img_file);
            if ($val_file !== "false")
            {
                echo "<html><body>\n"
                ."Bonjour Zaz<br />\n"
                ."<img src='data:"
                ."image/png"
                .";base64,".base64_encode($val_file)."'>\n"
                ."</body></html>";
            }
            else
                echo "error reading file \n";
        }
        else
        {
            header('HTTP/1.1 401 Unauthorized');
            echo "<html><body>"
            ."Cette zone est accessible uniquement aux membres du site"
            ."</body></html>";
        }
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized');
        die('Vous devez passer par une authentification via html pour acceder au site web\n');
    }
?>