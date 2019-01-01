<?php

    function creat_file ()
    {
        if (!file_exists("./private"))
            mkdir("./private");
        if (!file_exists("./private/passwd"))
            file_put_contents("./private/passwd",null, FILE_APPEND);
    }

    function is_login_existe($login)
    {
        $file = file_get_contents("./private/passwd"); // proteger
        echo $file;
        //lire le ficheir
        //deserialiser le contenue
        //rechercher le login dans le fichier
        // si on trouve le login return true
        // si non return false
        return false;
    }

    function add_compt($login, $passwd)
    {
        if (is_login_existe($login))
        echo "EROOR\n";
        else
        {
            //cree le tableu et mettre le log + le paswd

            //serialier le contenue / ou  tout le fichier a voir 

            //ajouter au tableu

            file_put_contents("./private/passwd",$login, FILE_APPEND);
        }
    }

    if ($_POST['submit'] == "OK")
    {
        creat_file ();
        add_compt($_POST['login'], $_POST['passwd']);

        echo $_POST['login'];
        echo $_POST['passwd'];
        echo $_POST['submit'];
    }
    else
        echo "EROOR\n";

?>