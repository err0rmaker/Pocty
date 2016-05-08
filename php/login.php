<?php
session_start();
require "../header.php";
require "inc/topNav.php";
require "functions.php";
require "../configuration.php";

$message = "";


if (isset($_SESSION["name"])) {
    header("Location: userTests.php");
} else {
    if (isset($_POST["name"]) && isset($_POST["password"])) {
        $name = clean($_POST["name"]);
        $password = clean($_POST["password"]);
        if (userExists($name)) {
            echo "<br>";
            echo "EXISTS";
            if (authenticate($name, $password)) {
                $_SESSION["name"] = $name;
                header("Location: userMenu.php");

            } else {
                $message = "Špatné přihlašovací údaje";
            }


        }
    } else {
        $message = "Vyplňte všechna pole";
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
require "../footer.php";

?>