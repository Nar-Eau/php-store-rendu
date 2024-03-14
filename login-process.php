<?php 

require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/functions/utils.php';
require_once __DIR__ . '/classes/UserError.php';
require_once __DIR__ . '/classes/Users.php';

session_start();

$login = trim($_POST['login']);
$password = trim($_POST['password']);
$accessDenied = true;

[
    'ADMIN_LOGIN' => $adminLogin,
    'ADMIN_PASSWORD' => $adminPassword
] = parse_ini_file(__DIR__ . '/config/admin.ini');

$user = new Users();
$alluser = $user->findAll();

foreach ($alluser as $index => $value) {
    if ($value['login'] === $login && $value['password'] === $password) {
        $accessDenied = false;
        $_SESSION['account_login'] = $login;
        $_SESSION['account_password'] = $password;
        $_SESSION['account_status'] = true;
        $_SESSION['message'] = "vous êtes connecté en tant que $login";

        if ($value['login'] === $adminLogin && $value['password'] === $adminPassword) {
            $_SESSION['superUser'] = true;
            $_SESSION['message'] = "Super User Mode activé";
        } else {
            $_SESSION['superUser'] = false;
        }
    }
}

if (empty($login)) {
    redirect('/login.php?error=' . UserError::LOGIN_REQUIRED);
}
if (empty($password)) {
    redirect('/login .php?error=' . UserError::PASSWORD_REQUIRED);
}
if ($accessDenied) {
    redirect('/login.php?error=' . UserError::ACCESS_DENIED);
}


redirect('/login.php');
