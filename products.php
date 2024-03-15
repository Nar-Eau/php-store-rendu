<?php
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/layout/header.php';
?>

<h1>Produits</h1>

<?php
$productsDb = new Products();
$products = $productsDb->findAll();
?>

<div class="list-container">
    <ul class="list-header">
        <?php foreach ($products as $product) { ?>    

        <li class="product-item">
            <a href="/product.php?id=<?php echo $product['id']; ?>"> <img src="<?php echo $product['cover']; ?>"></a>
        </li>
        <?php } ?>
    </ul>

</div>

<?php require_once __DIR__ . '/layout/footer.php'; ?>