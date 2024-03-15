<?php

require_once __DIR__ . '/functions/utils.php';
require_once __DIR__ . '/classes/Users.php';
session_start();

if (isset($_SESSION['account_status']) && $_SESSION['account_status'] == true) {

    $userDB = new Users();
    $users = $userDB->findAll();
    $login = $_SESSION['account_login'];
    $password = $_SESSION['account_password'];

    $productAdded = trim($_POST['product_id']);

    foreach($users as $user) {
        if($user['login'] == $login && $user['password'] == $password) {
            $panier = &$_SESSION['cartUSER' . $user['id']];
            array_push($panier, $productAdded);
        }
    }

    $_SESSION['message'] = "Votre produit à été ajouté au panier !";

    redirect("/");
} else {
    redirect("/login.php");
}