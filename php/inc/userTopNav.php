<div class="container">
    <div class="topNav">
        <div class="row">
            <div class="col-lg-2 topNavElement">
                <p>přihlášen jako:
                    <a href="profile.php">
                        <?php
                        if (array_key_exists($_SESSION, 'name')) {
                            echo $_SESSION['name'];
                        }
                        ?>
                    </a>
                </p>
            </div>


            <div class="col-lg-2 col-xs-3 topNavElement">
                <a href="userTests.php">
                    <button class="btn btn-default">Testy</button>

                </a>
            </div>
            <div class="col-lg-2 col-xs-3 topNavElement">
                <a href="profile.php">
                    <button class="btn btn-default">Můj profil</button>

                </a>
            </div>
            <div class="col-lg-2 col-xs-3 topNavElement">
                <a href="logout.php">
                    <button class="btn btn-default">LOGOUT</button>

                </a>
            </div>
            <div class="col-lg-2 col-xs-3 topNavElement">
                <a href="training.php">
                    <button type="button" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    </button>
                </a>
            </div>


        </div>
    </div>
</div>

