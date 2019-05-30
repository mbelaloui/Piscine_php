<?php

include 'sqlib.php';

if ($con = connect_mysql_serveur()) {
    echo "[Server connect : Success !]\n";
    var_dump($con);
} else {
    echo "[Server connect :Failure !]\n";
    var_dump($con);
}

if ($con = connect_db()) {
    echo "[DB Connect : Success !]\n";
    var_dump($con);
} else {
    echo "[DB Connect : Failure !]\n";
    var_dump($con);
}

if (is_pseudo_exist($con, 'root')) {
    echo "[We can read data !]";
} else {
    echo "[We can't read data :(]";
}

var_dump(get_list_produit($con));
