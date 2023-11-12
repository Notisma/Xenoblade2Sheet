<?php

namespace XC2S\Controllers;

class ControllerBladeCombo extends ControllerMain
{
    public static function displayBladeCombo(): void
    {
        self::displayViewInBody("Blade Combo", "viewBladeCombo.php");
    }
}
