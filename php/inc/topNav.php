<div class="container">
    <div class="topNav">
        <div class="row">
            <div class="col-lg-2 topNavElement">
                <p>přihlášen jako:
                    <a href="profile.php">
                        <?php
                        if (isset($_SESSION['name'])) {
                            echo $_SESSION["name"];
                        } else {
                        } ?>
                    </a>
                </p>
            </div>
            <div class="col-lg-offset-5 col-lg-1 topNavElement">
                <a href="<?php ROOT_PATH . "php/login.php"; ?>">
                    <!--                    <button class="btn btn-default">LOGIN</button>-->
                    neco

                </a>

            </div>
            <div class="col-lg-1 topNavElement">
                <a href="<?php ROOT_PATH . "php/logout.php"; ?>">
                    <button class="btn btn-default">LOGOUT</button>

                </a>
            </div>
            <div class="col-lg-1 topNavElement">
                <a href="../../index.php">
                    <button type="button" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    </button>
                </a>
            </div>


        </div>
    </div>
</div>

