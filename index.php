<?php
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/classes/Categories.php';
require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/layout/header.php';
?>

<h1>Bienvenue</h1>

<?php
        $productsDb = new Products();
        $products = $productsDb->findAll();

        $user = new Users();
        $alluser = $user->findAll();
?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>