<?php
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/layout/header.php';
?>

<h1>Bienvenue</h1>

<?php
$productsDb = new Products();
$products = $productsDb->findAll();
?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>