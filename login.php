<?php

require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/functions/error.php';

?>

<main>

    <?php if (isset($_GET['error'])) { ?>
        <p style="color: white; background-color: red;">
            <?php echo errorMessage(intval($_GET['error'])); ?>
        </p>
    <?php } ?>

    <?php if (isset($_SESSION['account_status']) && $_SESSION['account_status'] == true) {?>
        
        <h1>Mon Compte</h1>

        <div class="account">
            <div id="login"> Login : <?php echo $_SESSION['account_login'] ?></div>
            <div id="password"> Password : <?php echo $_SESSION['account_password'] ?></div>
        </div>
        <br>
        <form action="">
            <button type="submit" formaction="disconnect-process.php">Se Déconnecter</button>
        </form>

        <a href="/cart.php">
            <img class="cart" src="/assets/img/cart.jpeg" alt="panier">
        </a>
    <?php } 
    else { ?>

        <h1>Connectez-vous / Creer un compte</h1>
    
        <form action="" method="POST">
            <div>
                <label for="login">Login :</label>
                <input type="text" name="login"/>
            </div>
            <div>
                <label for="password">Password :</label>
                <input type="text" name="password"/>
            </div>
            <div>
                <input type="submit" formaction="login-process.php" value="Se connecter" />
                <input type="submit" formaction="register-process.php" value="Creer un compte" />
            </div>
        </form>
   <?php } ?>

</main>

<?php require_once __DIR__ . '/layout/footer.php';?>