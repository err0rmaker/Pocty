<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pocty</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome-4.6.1/css/font-awesome.min.css">

</head>
<body id="bootstrap-overrides">
<div class="container">
    <div class="topNav">
        <div class="row">
            <?php if (!$auth->isGuest()) { ?>
                <div class="col-lg-2 topNavElement">
                    <p>přihlášen jako: <a href="profile.php"><?php echo $auth->getLoggedInUserName(); ?></a></p>
                </div>
                <div class="col-lg-2 col-xs-3 topNavElement">
                    <a class="btn btn-default" href="userTests.php">Testy</a>
                </div>

                <div class="col-lg-2 col-xs-3 topNavElement">
                    <a class="btn btn-default" href="profile.php">Můj profil</a>
                </div>
                <div class="col-lg-2 col-xs-3 topNavElement">
                    <a class="btn btn-default" href="logout.php">LOGOUT</a>
                </div>
            <?php } else { ?>
                <div class="col-lg-2 topNavElement">
                    <p>Nepřihlášený</p>
                </div>
                <div class="col-lg-2 col-xs-3 topNavElement">
                    <a class="btn btn-default" href="login.php">LOGIN</a>
                </div>
                <div class="col-lg-2 col-xs-3 topNavElement">
                    <a class="btn btn-default" href="register.php">Registrace</a>
                </div>
            <?php } ?>
            <div class="col-lg-2 col-xs-3 topNavElement">
                <a href="training.php" class="btn btn-default">

                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>

                </a>
            </div>
        </div>
    </div>
</div>