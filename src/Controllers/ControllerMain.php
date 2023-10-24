<?php

namespace XC2S\Controllers;

class ControllerMain
{
    public static function displayView(string $viewPath, array $parameters = []): void
    {
        extract($parameters);
        require __DIR__ . "/../views/$viewPath"; // Charge la view
    }

    protected static function displayViewInBody(string $pageTitle, string $viewPath, array $parameters = []): void
    {
        self::displayView("viewGeneral.php", array_merge(
            [
                'pageTitle' => $pageTitle,
                'path' => $viewPath
            ],
            $parameters
        ));
    }

    public static function displayIndex(): void
    {
        self::displayViewInBody("Accueil", "viewIndex.php");
    }

    public static function displayError(string $error): void
    {
        self::displayViewInBody("Error", 'viewError.php', [
            'errorStr' => $error
        ]);
    }

}
