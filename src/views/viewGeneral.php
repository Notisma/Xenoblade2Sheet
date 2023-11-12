<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="xenoblade 2 combat cheat sheet"/>

    <title>XC2S - <?= $pageTitle ?></title>
    <link rel="icon" type="image/png" href="../ressources/images/website_icon.png"/>

    <link rel="stylesheet" href="../ressources/css/main.css"/>
    <link rel="stylesheet" href="../ressources/css/<?= $secondaryCSSpath ?>">
    <script src="../ressources/javascript/functions.js"></script>
</head>
<body>
<header>
    <h1>Xenoblade Chronicles 2 Sheet - <?= $pageTitle ?></h1>
    <?php
    if (\XC2S\Lib\UserConnection::isConnected())
        echo '<a href="?controller=Connection&action=displayUserDetails"><img src="../ressources/images/connection/user.png" alt="user"></a>';
    else
        echo '<a href="?controller=Connection&action=displayConnectionPage"><img src="../ressources/images/connection/enter.png" alt="login"></a>';
    ?>
    <nav>
        <div><a href="?controller=Main&action=displayIndex">Accueil</a></div>
        <div><a href="?controller=DriverCombo&action=displayDriverCombo">Driver Combos</a></div>
        <div><a href="?controller=BladeCombo&action=displayBladeCombo">Blade Combos</a></div>
        <div><a href="?controller=TeamBuilder&action=displayBuilderIndex">Team Builder</a></div>
    </nav>
</header>

<h2><?= $pageTitle ?></h2>

<section>
    <?php require __DIR__ . "/$path"; ?>
</section>

<footer>
    <p>--------------------<br/>Bye world (footer...)<br/>--------------------</p>
</footer>
</body>
</html>
