<?php
require_once __DIR__ . '/classes/Categories.php';
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/layout/header.php';

if(isset($_GET['id']) && $_GET['id'] != "") {
    $id = intval($_GET['id']); // TODO: Vérifier que la clé 'id' existe

    $categoriesDb = new Categories();
    $category = $categoriesDb->find($id);
    
    if ($category === null) {
        http_response_code(404);
        echo "Catégorie non trouvée";
        exit;
    }?>

    <h1><?php echo $category['name']; ?></h1>

    <?php 
    
        $productDB = new Products();
        $products = $productDB->findAll();
        
    ?>

        
    <ul class="list-header">

        <?php foreach($products as $product) {
            if ($product['category_id'] === $category['id']) { ?>
                <li class="product-item">
                    <a href="/product.php?id=<?php echo $product['id']; ?>"> <img src="<?php echo $product['cover']; ?>"></a>
                </li>
        <?php }
        } ?>

    </ul>

  <?php  }

require_once __DIR__ . '/layout/footer.php';