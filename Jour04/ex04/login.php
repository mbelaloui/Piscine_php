<?php
    session_start();
    include ("auth.php");

    function start_session($login, $passwd)
    {
        if (auth($login, $passwd))
            return $login;
        return "";
    }
    $_SESSION["loggued_on_user"] = start_session($_POST['login'], $_POST['passwd']);
    if ($_SESSION["loggued_on_user"] == "")
        echo "ERROR\n";
    else
    {
        echo "OK\n";
        include("chat.php");
        include("speak.php");
    }
/*  test
**  echo "ret ==> ".$_SESSION["loggued_on_user"];
*/
?>

