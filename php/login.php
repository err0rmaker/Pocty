<?php
session_start();
require __DIR__ . '/../configuration.php';
require __DIR__ . '/../header.php';
require __DIR__ . '/inc/topNav.php';
require __DIR__ . '/functions.php';

$message = '';

$auth = new Authentication();

if (array_key_exists('name', $_SESSION)) {
    header('Location: userTests.php');
} else {
    if (array_key_exists('name', $_POST) && array_key_exists('password', $_POST)) {
        $name = $auth->clean($_POST['name']);
        $password = $auth->clean($_POST['password']);
        if ($auth->userExists($name)) {

            if ($auth->authenticate($name, $password)) {
                $_SESSION['name'] = $name;
                header('Location: userTests.php');

            } else {
                $message = 'Špatné přihlašovací údaje';
            }


        }
    } else {
        $message = 'Vyplňte všechna pole';
    }
}

?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">

                    <form class="form-signin" action="login.php" method="post">
                        <h1 class="text-center login-title">Přihlášení</h1>

                        <input type="text" class="form-control" placeholder="Jméno" required autofocus name="name">
                        <input type="password" class="form-control" placeholder="Heslo" required name="password">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Přihlásit
                        </button>
                        <p><?php echo $message ?></p>

                    </form>

                </div>
                <div class="col-xs-12 text-center" id="registerButton">
                    <a href="register.php">
                        <button type="button" class="btn btn-secondary">Registrovat</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
require __DIR__ . '/../footer.php';

?>