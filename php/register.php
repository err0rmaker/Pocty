<?php
session_start();
require __DIR__ . '../header.php';
require __DIR__ . 'inc/topNav.php';
require __DIR__ . 'functions.php';

$errorMsg = '';
$message = '';
$DBC = new DOConnect();
$conn = $DBC->getConnection();
if (array_key_exists($_SESSION, 'name')) {
    header('Location: userTests.php');
} else {
    if (array_key_exists($_POST, 'name') && array_key_exists($_POST, 'password') && array_key_exists($_POST, 'password2')) {
        $name = clean($_POST['name']);
        $password = clean($_POST['password']);
        $password2 = clean($_POST['password2']);


        if ($password !== $password2) {
            $errorMsg = 'Hesla se neshodují';
        } elseif (strlen($password) < 8) {
            $errorMsg = 'Heslo musí být alespoň 8 znaků dlouhé';


        } else {
            if (userExists($conn, $name)) {
                $errorMsg = 'Uživatelské jméno už je zabráno';
            } else {
                $errormsg = '';
                if (createUserAccount($conn, $name, $password)) {
                    $message = 'Registrace proběhla v pořádku.' . "<a href = 'login.php.'>Můžete se teď přihlásit</a>";
                    header('Location: login.php');
                }
            }

        }
    } else {
        $errorMsg = 'Vyplňte všechna pole';
    }
}

?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">

                    <form class="form-signin" action=register.php method="post">
                        <h1 class="text-center login-title">Registrace</h1>

                        <input type="text" class="form-control" placeholder="Jméno" required autofocus name="name">
                        <input type="password" class="form-control" placeholder="Heslo" required name="password">
                        <input type="password" class="form-control" placeholder="Heslo znovu" required name="password2">

                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Registrovat
                        </button>
                        <p><?php echo $errorMsg ?></p>

                        <p><?php echo $message ?></p>

                    </form>

                </div>
                <div class="col-xs-12 text-center" id="registerButton">
                    <a href="login.php">
                        <button type="button" class="btn btn-secondary">Přihlásit</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
require __DIR__ . '../footer.php';

?>