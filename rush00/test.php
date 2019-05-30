<?php 

    include ('sqlib.php');
    $con = connect_db();

/*    for ($id_produit=0; $id_produit < 3; $id_produit++) 
    { 
        var_dump(get_produit($con, $id_produit));    
    }*/

//    print_r(get_categorie($con));



    $id_catS = 1;
    $id_catP = 1;
    var_dump(get_categorieP_related_to_S($id_catS));


    var_dump(get_categorieS_related_to_P($id_catP));


    var_dump(get_produit_categorieP($id_catP));

    var_dump(get_produit_categorieS($id_catS));


//    $id_iser = 1;
//    passer_comamnde($id_iser, $date);
?>