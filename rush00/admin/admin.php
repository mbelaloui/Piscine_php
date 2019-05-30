<?php
    session_start();
    if ($_SESSION['login'] != 'root' && $_SESSION['password'] != 'root')
        header('Location : index.php');
    function check_if_exists_P()
    {
        $tab = get_categoriep();
        foreach ($tab as $key => $value)
            foreach ($value as $field)
                if (!is_numeric($field))
                    if ($_POST['category_name_p'] == $field)
                        return 0;
        return 1;
    }

    function check_if_exists_S()
    {
        $tab = get_categories();
        foreach ($tab as $key => $value)
            foreach ($value as $field)
                if (!is_numeric($field))
                    if ($_POST['category_name_s'] == $field)
                        return 0;
        return 1;
    }
    function get_id_categorie_P()
    {
        $tab = get_categoriep();
        $cate_name_p = $_POST['category_name_P'];
        foreach ($tab as $key => $value)
            foreach ($value as $field)
                if (is_numeric($field))
                {
                    echo "field >>>> " ;print_r($field['description_categoriep']."\n");
                    //echo "print r >>>>>> " ;print_r($_POST['category_name_P']);
                    if ($_POST['category_name_P'] == $field['description_categoriep'])
                        return $field['id_categoriep'];
                }
        return -1;
    }
    if ($_POST['submit'] && !empty($_POST['submit']) && $_POST['category_name_s'] && !empty(trim($_POST['category_name_s'])))
    {
        if ($_GET['action'] == "add_categorie")
        {
            $description_categorie = $_POST['category_name_s'];
            include('../sqlib.php');
            if (check_if_exists_S())
            {
                add_categories(connect_db(), $description_categorie);
                $tab_s = get_categories();
                $endtab_s = end($tab_s);
                
                $id_s = $endtab['id_categories'];
                $id_p = get_id_categorie_P();
                var_dump($id_p);
                make_categori_relation($id_s, $id_p);
                echo $description_categorie ."Successfully added\n";
            }
            else
                echo "Error in relation\n";
        }
    } 
    
        if ($_POST['submit'] && !empty($_POST['submit']) && $_POST['category_name_p'] && !empty(trim($_POST['category_name_p'])))
        {
            if ($_GET['action'] == "add_categorie")
            {
                $description_categorie = $_POST['category_name_p'];
                include('../sqlib.php');
                if (check_if_exists_P())
                {
                    add_categoriep(connect_db(), $description_categorie);
                    echo $description_categorie ."Successfully added\n";
                }
            else
                echo "Category already exist.\n";
            }
        } 
?>
<html>

<head>
    <link rel="stylesheet" href="../css/style_admin.css" />
    <link href="http://fonts.googleapis.com/css?family=Terminal+Dosis" rel="stylesheet" type="text/css" />
</head>

</html>
<div class="admin_container">
    <div class="admin_block">
    </br>
        <h1 class="active">Produits</h1></br></br>
        <ul>
                <li><a href="?action=add_product">Ajouter un produit</a></li>
                 <?php if ($_GET['action'] == "add_product") : ?>
                    <form style="margin-top:1.2vw" action="" method="post">
                        <input required placeholder="Titre" type="text" name="pseudo" />
                        <input required placeholder="Description" type="text" name="mail" />
                        <input required placeholder="Quantité" type="number" name="mdp" />
                        <input required placeholder="Image" type="text" name="perm" />
                        <input type="submit" name="submit" value="ajouter"/>
                     </form>
                     <?php endif;?>
                <li><a href="?action=modify_product">Modifier un produit</a></li>
                    <?php if ($_GET['action'] == "modify_product") : ?>
                         <form style="margin-top:1.2vw" action="" method="post">
                            <input required placeholder="ID Produit" type="text" name="pseudo" />
                            <input placeholder="Titre" type="text" name="pseudo" />
                            <input placeholder="Description" type="text" name="mail" />
                            <input placeholder="Quantité" type="number" name="mdp" />
                            <input placeholder="Image" type="text" name="perm" />
                            <input type="submit" name="submit" value="modifier" />
                         </form>
                         <?php endif;?>
                <li><a href="?action=delete_product">Supprimer un produit</a></li>
                <?php if ($_GET['action'] == "delete_product") : ?>
                         <form style="margin-top:1.2vw" action="" method="post">
                            <input required placeholder="ID Produit" type="text" name="pseudo" />
                            <input type="submit" name="submit" value="supprimer" />
                         </form>
                         <?php endif;?>
        </ul>
</br></br></br><h1 class="active">Utilisateurs</h1></br></br>
        <ul>
            <li><a href="?action=add_user">Ajouter un utilisateur</a></li>
            <?php if ($_GET['action'] == "add_user") : ?>
                <form style="margin-top:1.2vw" action="" method="post">
                    <input required type="text" name="nom" placeholder="Name" />
                    <input required type="text" name="prenom" placeholder="Lastname" />
                    <input required type="mail" pattern=".+@.+.com" name="mail" placeholder="Mail" />
                    <input required type="text" name="login" minlength="5" placeholder="Login" />
                    <input required type="password" name="passwd" minlength="8" placeholder="Password" />
                    <input type="submit" name="submit" value="ajouter" />
                     </form>
                     <?php endif;?>
            <li><a href="?action=modify_user">Modifier un utilisateur</a></li>
            <?php if ($_GET['action'] == "modify_user") : ?>
                <form style="margin-top:1.2vw" action="" method="post">
                    <input required type="text" name="login" minlength="5" placeholder="Login" />
                    <input required type="text" name="nom" placeholder="Name" />
                    <input required type="text" name="prenom" placeholder="Lastname" />
                    <input required type="mail" pattern=".+@.+.com" name="mail" placeholder="Mail" />
                    <input required type="password" name="passwd" minlength="8" placeholder="Password" />
                    <input type="submit" name="submit" value="modifier"/>
                     </form>
                     <?php endif;?>
            <li><a href="?action=delete_user">Supprimer un utilisateur</a></li>
            <?php if ($_GET['action'] == "delete_user") : ?>
                <form style="margin-top:1.2vw" action="" method="post">
                    <input required type="text" name="login" minlength="5" placeholder="Login" />
                    <input required type="mail" pattern=".+@.+.com" name="mail" placeholder="Mail" />
                    <input type="submit" name="submit" value="supprimer" />
                     </form>
                     <?php endif;?>
         </ul>
         </br></br></br><h1 class="active">Catégories</h1></br></br>
        <ul>
            <li><a href="?action=add_categorie">Ajouter une catégorie</a></li>
                <?php if ($_GET['action'] == "add_categorie") : ?>
                <li><a>Ajouter une catégorie principale</a></li>
                    <form style="margin-top:1.2vw" method="post">
                        <input maxlength="50" required type="text" name="category_name_p" placeholder="Nom de la catégorie" />
                        <input type="submit" name="submit" value="ajouter" />
                     </form>
                    <li><a>Ajouter une catégorie secondaire</a></li>
                    <form style="margin-top:1.2vw;" action="" method="post">
                        <select>
                        <option value="" disabled selected>Catégorie Parent</option>
                        <?php 
                            include('../sqlib.php');
                            $tab = get_categories();
                            foreach ($tab as $key => $value)
                                foreach ($value as $field)
                                    if (!is_numeric($field))
                                    {
                                        echo "<option>"."$field"."</option>";
                                        $_POST['categorie_name_P'] = $field;
                                    }
                        ?>
                        </select>
                        <input required type="text" name="category_name_s" placeholder="Nom de la catégorie" />
                        <input type="submit" name="submit" value="ajouter" />
                     </form> 
                    <?php endif;?>
            <li><a href="?action=modify_categorie">Modifier une catégorie</a></li>
                <?php if ($_GET['action'] == "modify_categorie") : ?>
                    <form style="margin-top:1.2vw" action="" method="post">
                    <select>
                        <option value="" disabled selected>Nom de la catégorie</option>
                        <?php 
                            include('../sqlib.php');
                            $tab = get_categoriep();
                            foreach ($tab as $key => $value)
                                foreach ($value as $field)
                                    if (!is_numeric($field))
                                    echo "<option>"."$field"."</option>";
                        ?>
                        </select>
                        <input required type="text" name="category_name_p" placeholder="Nouveau nom" />
                        <input type="submit" name="submit" value="modifier" />
                     </form>
                <?php endif ;?>
            <li><a href="?action=delete_categorie">Supprimer une catégorie</a></li>
            <?php if ($_GET['action'] == "delete_categorie") : ?>
                    <form style="margin-top:1.2vw" action="" method="post">
                    <select>
                        <option value="" disabled selected>Choisir une catégorie</option>
                        <?php 
                            include('../sqlib.php');
                            $tab = get_categoriep();
                            foreach ($tab as $key => $value)
                                foreach ($value as $field)
                                    if (!is_numeric($field))
                                    echo "<option>"."$field"."</option>";
                        ?>
                        </select>
                        <input type="submit" name="submit" value="surpprimer" />
                     </form>
                <?php endif ;?>
        </ul>
        </div>
</div></br></br></br></br>