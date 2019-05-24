<?php
    session_start();
    header("content-type: text/html");
    header('HTTP/1.1 200 OK');
?>
<html>
    <body>
        <form action="index.php" method="get">
            Identifiant: <input type="text" name="login" value="<?php
                if (array_key_exists("submit", $_GET) and $_GET["submit"] == "OK")
                {
                    if (array_key_exists("login", $_GET))
                        $_SESSION["login"] = $_GET["login"];
                }
                if (array_key_exists("login", $_SESSION))
                    echo $_SESSION["login"];
            ?>" />
            <br />
            Mot de passe: <input type="password" name="passwd" value="<?php
                if (array_key_exists("submit", $_GET) and $_GET["submit"] == "OK")
                {
                    if (array_key_exists("passwd", $_GET))
                        $_SESSION["passwd"] = $_GET["passwd"];
                }
                if (array_key_exists("passwd", $_SESSION))
                    echo $_SESSION["passwd"];
            ?>" />
            <br />
            <input type="submit" name="submit" value="OK" />
        </form>
    </body>
</html>