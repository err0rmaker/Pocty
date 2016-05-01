<?php
session_start();
require "inc/header.php";
require "inc/backHome.php";
require "functions.php";
$errorMsg = "";
if (isset($_POST["name"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
    $name = clean($_POST["name"]);
    $password = clean($_POST["password"]);
    $password2 = clean($_POST["password2"]);


    if ($password != $password2) {
        $errorMsg = "Hesla se neshodují";
    } elseif (strlen($password) < 8) {
        $errorMsg = "Heslo musí být alespoň 8 znaků dlouhé";
    } else {
        $errormsg = "";
        createUserAccount($name, $password);


    }


} else {
    $errorMsg = "Vyplňte všechna pole";
}
/**
 * Vyčistí jméno a heslo od uvozovek a vloží uživatele do databáze
 * @param $name
 * @param $password
 *
 */
function createUserAccount($name, $password)
{


    $conn = DBConnect();
    //obrana proti sql injekci
    $name = $conn->real_escape_string($name);
    $password = $conn->real_escape_string($password);


    SetLocale(LC_ALL, "Czech");
    $date = StrFTime("%d/%m/%Y %H:%M:%S", Time());
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT into uzivatele (name,password,date) VALUES ('$name', '$password', '$date')";
    if ($conn->query($sql)) {
        printf("%d Row inserted.\n", mysqli_affected_rows($conn));

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
require "inc/footer.php";

?>