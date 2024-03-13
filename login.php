<?php

require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/functions/error.php';

?>

<main>

    <h1>Connectez-vous / Creer un compte</h1>

    <?php if (isset($_GET['error'])) { ?>
        <p style="color: white; background-color: red;">
            <?php echo errorMessage(intval($_GET['error'])); ?>
        </p>
    <?php } ?>

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
</main>


<?php require_once __DIR__ . '/layout/footer.php'; ?>