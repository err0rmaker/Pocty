


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
require __DIR__ . '/../bootstrap.end.php';

?>