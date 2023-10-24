<?php

require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';

// initialisation
$loader = new XC2S\Lib\Psr4AutoloaderClass();
$loader->register();
// enregistrement d'une association "namespace" → "dossier"
$loader->addNamespace('XC2S', __DIR__ . '/../src');

use XC2S\Controllers\ControllerMain as CGlobal;

if (isset($_GET['controller'])) {
    $controller = ucfirst($_GET["controller"]);
} else {
    $controller = "Main";
}

if (isset($_GET['action'])) {
    $action = lcfirst($_GET["action"]);
} else {
    $action = "displayIndex";
}

$nomClasseController = "XC2S\Controllers\Controller$controller";

if (class_exists($nomClasseController)) {
    if (in_array($action, get_class_methods($nomClasseController))) {
        $nomClasseController::$action();
    } else
        CGlobal::displayError("L'action :\" $action \" n'existe pas dans le controller :\" $nomClasseController \"");
} else
    CGlobal::displayError("Le contrôleur :\" $nomClasseController \" n'existe pas");
