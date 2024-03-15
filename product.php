<?php
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/classes/Categories.php';
require_once __DIR__ . '/layout/header.php';

if(isset($_GET['id']) && $_GET['id'] != "") {
    $id = intval($_GET['id']); // TODO: Vérifier que la clé 'id' existe

    $productsDb = new Products();
    $product = $productsDb->find($id);
    
    if ($product === null) {
        http_response_code(404);
        echo "Produits non trouvée";
        exit;
    }
    
    $categoryDB = new Categories();
    $category = $categoryDB->find($product['category_id']);
    
    ?>

    <h1><?php echo $product['name']; ?></h1>

    <div class="product-preview">
        <img src="<?php echo $product['cover']?>" alt="<?php echo $product['name']?>">
        <div class="product-info">
            <em> <?php echo $category['name'] ?> </em> <br><br> 

            <?php echo $product['price_vat_free']; ?> <br>
            <?php  echo $product['description']; ?> <br>   

            <form action="cart-process.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <button type="submit">Ajouter au panier</button>
            </form>
        </div>

    </div>

  

<?php }

require_once __DIR__ . '/layout/footer.php';