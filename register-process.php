<?php 

require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/functions/utils.php';
require_once __DIR__ . '/classes/UserError.php';
require_once __DIR__ . '/classes/Users.php';

$login = trim($_POST['login']);
$password = trim($_POST['password']);
$loginExists = false;

$user = new Users();
$alluser = $user->findAll();

foreach ($alluser as $index => $value) {
    if ($value['login'] === $login)
        $loginExists = true;
}


if (empty($login)) {
    redirect('/login.php?error=' . UserError::LOGIN_REQUIRED);
}
if (empty($password)) {
    redirect('/login.php?error=' . UserError::PASSWORD_REQUIRED);
}
if ($loginExists) {
    redirect('/login.php?error=' . UserError::LOGIN_ALREADY_EXISTS);
}

try {
    $pdo = Database::getConnection();
} catch(PDOException $ex) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$stmt = $pdo->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
$stmt->execute([
    'login' => $login,
    'password' => $password
]);

if ($stmt === false) {
    echo "Erreur lors de la requête";
    exit;
}

session_start();
$_SESSION['account_login'] = $login;
$_SESSION['account_password'] = $password;
$_SESSION['message'] = "votre compte à bien été crée";

redirect('/');
