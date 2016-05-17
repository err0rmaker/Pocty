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
<nav class="navbar navbar-inverse" id="customNavbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav ">
                <?php if (!$auth->isGuest()) { ?>
                    <li>
                        <a class="navbar-brand"
                           href="profile.php">Přhlášen jako: <?php echo $auth->getLoggedInUserName(); ?></a>
                    </li>
                    <li>
                        <a class="navbar-btn" href="userTests.php">Testy</a>
                    </li>

                    <li>
                        <a class="navbar-btn" href="profile.php">Můj profil</a>
                    </li>
                    <li>
                        <a class="navbar-btn" href="logout.php">LOGOUT</a>
                    </li>
                <?php } else { ?>

                    <li>
                        <a class="navbar-btn">Nepřihlášený</a>
                    </li>
                    <li>
                        <a class="navbar-btn navbar-static-top" href="login.php">LOGIN</a>
                    </li>
                    <li>
                        <a class="navbar-btn" href="register.php">Registrace</a>
                    </li>

                <?php } ?>
                <li>

                    <a href="training.php" class="navbar-btn">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>