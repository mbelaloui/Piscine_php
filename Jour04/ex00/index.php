<?php
    header("content-type: text/html");
    header('HTTP/1.1 200 OK');
    session_start();
?>
<html>
    <body>
        <form action="index.php" method="get">
            Identifiant: <input type="text" name="login" value="<?php
                if ($_GET["submit"] == "OK")
                    $_SESSION["login"] = $_GET["login"];
                 echo $_SESSION["login"];     
            ?>" />
            <br />
            Mot de passe: <input type="password" name="passwd" value="<?php
                if ($_GET["submit"] == "OK")
                    $_SESSION["passwd"] = $_GET["passwd"];
                echo $_SESSION["passwd"];
            ?>" />
            <br />
            <input type="submit" name="submit" value="OK" />
        </form>
    </body>
</html>