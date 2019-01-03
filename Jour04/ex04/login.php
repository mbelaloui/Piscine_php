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
    {
        header('Location: index.html');
        echo "ERROR\n";
    }
    else
    {
        echo "OK\n";
        ?>
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8" />
                <title>Room</title>
                <style>

                    body
                    {
                        background-color:   rgb(102, 145, 170);
                    }

                    #logout
                    {
                        margin-left : 0%;
                    }

                    #chat
                    {
                        background-color: white;
                    }
                </style>
            </head>
            <body>
                <a href="logout.php" id="logout" class="link">Deconnexion</a><br />
                <iframe name="chat" id=chat src="chat.php" width=100% height=550px></iframe>
                <iframe name="speak" src="speak.php" width=100% height=50px></iframe>
            </body>
            </html>
        <?php
    }
?>