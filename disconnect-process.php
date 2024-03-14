<?php 

require_once __DIR__ . '/functions/utils.php';
session_start();

$_SESSION['account_status'] = false;
$_SESSION['account_login'] = "";
$_SESSION['account_password'] = "";

//on déconnecte également les session spéciale (admin)
$_SESSION['superUser'] = false;

$_SESSION['message'] = "Vous avez été déconnecté avec succès";

redirect('/');
