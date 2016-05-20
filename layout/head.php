<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pocty</title>
    <link rel="stylesheet" href="<?php //echo BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?php //echo BASE_URL; ?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php //echo BASE_URL; ?>css/font-awesome-4.6.1/css/font-awesome.min.css">

    <script src="js/jquery-2.2.3.min.js" type="application/javascript"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js" type="application/javascript"></script>
    <script src="js/math.js" type="application/javascript"></script>

    <script type="text/javascript" src="//d3js.org/d3.v3.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css"/>
    <link href='https://fonts.googleapis.com/css?family=Righteous&subset=latin,latin-ext' rel='stylesheet'
          type='text/css'>

</head>
<body id="bootstrap-overrides">
<nav class="navbar navbar-inverse" id="customNavbar" style="border: none; background-color: transparent">
    <div class="container-fluid" id="customNavbar" style="background-color: transparent">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"
                    style="border: none">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Karel Šoupa | Počty</a>
        </div>
        <a class="navbar-brand" href="profile.php">Přhlášen
            jako: <?php echo $auth->isGuest() ? '' : $auth->getLoggedInUserName(); ?></a>
        <div class="collapse navbar-collapse" id="myNavbar" style="border: none">

            <ul class="nav navbar-nav navbar-right">
                <?php if (!$auth->isGuest()) { ?>

                    <li>
                        <a class="navbar-btn" href="userTests.php">Testy</a>
                    </li>

                    <li>
                        <a class="navbar-btn" href="profile.php">Můj profil</a>
                    </li>
                    <li>
                        <a class="navbar-btn" href="leaderboards.php">Žebříčky</a>
                    </li>
                    <li>
                        <a class="navbar-btn" href="logout.php">LOGOUT</a>
                    </li>
                <?php } else { ?>

                    <li>
                        <a class="navbar-btn" href="login.php">LOGIN</a>
                    </li>
                    <li>
                        <a class="navbar-btn" href="register.php">Registrace</a>
                    </li>

                <?php } ?>
                <li>
                    <a href="index.php" class="navbar-btn">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>