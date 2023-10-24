<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="xenoblade 2 combat cheat sheet"/>

    <title>XC2S - <?= $pageTitle ?></title>
    <link rel="icon" type="image/png" href="../ressources/images/icon.png"/>

    <link rel="stylesheet" href="../ressources/css/main.css"/>
</head>
<body>
<header>
    <h1>Xenoblade Chronicles 2 Sheet - <?= $pageTitle ?></h1>
    <nav>
        <div><a href="?controller=Main&action=displayIndex">Accueil</a></div>
        <div><a href="?controller=DriverCombo&action=displayDriverCombo">Driver Combos</a></div>
        <div><a href="?controller=BladeCombo&action=displayBladeCombo">Blade Combos</a></div>
        <div><a href="./contact.html">Team Builder</a></div>
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
