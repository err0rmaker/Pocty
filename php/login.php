<?php
require "header.php";
require "backHome.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">

                    <form class="form-signin">
                        <h1 class="text-center login-title">Přihášení</h1>

                        <input type="text" class="form-control" placeholder="Jméno" required autofocus name="jmeno">
                        <input type="password" class="form-control" placeholder="Heslo" required name="heslo">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Přihlásit
                        </button>
                    </form>

                </div>
                <button type="button" class="btn btn-secondary">Registrovat</button>


            </div>
        </div>
    </div>
<?php
require "footer.php";

?>