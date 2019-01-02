<?php
    session_start();
    include ("auth.php");

    function start_session($login, $passwd)
    {
        if (auth($login, $passwd))
            return $login."/".$passwd;
        return "";
    }
    $_SESSION["loggued_on_user"] = start_session($_GET['login'], $_GET['passwd']);
    if ($_SESSION["loggued_on_user"] == "")
        echo "ERROR\n";
    else
        echo "OK\n";
/*  test
**  echo "ret ==> ".$_SESSION["loggued_on_user"];
*/

?>