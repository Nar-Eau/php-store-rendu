<?php 

require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/functions/utils.php';
require_once __DIR__ . '/classes/UserError.php';
require_once __DIR__ . '/classes/Users.php';

$login = trim($_POST['login']);
$password = trim($_POST['password']);
$accessDenied = true;

$user = new Users();
$alluser = $user->findAll();

foreach ($alluser as $index => $value) {
    if ($value['login'] === $login && $value['password'] === $password)
        $accessDenied = false;
}

if (empty($login)) {
    redirect('/login.php?error=' . UserError::LOGIN_REQUIRED);
}
if (empty($password)) {
    redirect('/login.php?error=' . UserError::PASSWORD_REQUIRED);
}
if ($accessDenied) {
    redirect('/login.php?error=' . UserError::ACCESS_DENIED);
}

session_start();
$_SESSION['account_login'] = $login;
$_SESSION['account_password'] = $password;
$_SESSION['message'] = "vous êtes connecté en tant que $login";

redirect('/');
