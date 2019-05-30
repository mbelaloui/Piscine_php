<?php

include ('sqlib.php');

session_start();
if ($_POST["submit"] == "OK" AND !empty($_POST["login"]) AND !empty($_POST["passwd"]) AND !empty($_POST["mail"]))
{
    $account = array("login" => $_POST["login"], "passwd" => hash("whirlpool", $_POST["passwd"]));
    $login = $_POST["login"];
    $_SESSION["new_user"] = $login;
   
    
    $pseudo_user = $_POST["login"];
    $passwd_user = hash("whirlpool", $_POST["passwd"]);
    $email_user = $_POST["mail"];

    register($pseudo_user, $passwd_user, $email_user);
   header('Location: sign_in.php');/// il faut lui dire que c'est ok
}
else
    header('Location: sign_in.php?register=true'); //// error 

?>
