<?php

require_once __DIR__ . '/functions/utils.php';
require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/layout/header.php';
?> 

<h1>Panier</h1>

<?php

$userDB = new Users();
$users = $userDB->findAll();
$login = $_SESSION['account_login'];
$password = $_SESSION['account_password'];

foreach($users as $user) {
    if($user['login'] == $login && password_verify($password, $user['password'])) {
        $panier = &$_SESSION['cartUSER' . $user['id']];
    }
}

$product = new Products();
$products = $product->findAll();

if(isset($panier)) {
    foreach($panier as $articleID) { 
        $article = $product->find($articleID); ?>
    
        <div class="product-preview">
            <img src="<?php echo $article['cover']?>" alt="<?php echo $article['name']?>">
            <div class="product-info">
                <?php echo $article['price_vat_free']; ?> <br>
                <?php  echo $article['description']; ?> <br>   
            </div>
    
        </div>
<?php  }
}
