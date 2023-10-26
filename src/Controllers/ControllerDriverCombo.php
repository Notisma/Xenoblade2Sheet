<?php

namespace XC2S\Controllers;

use XC2S\Model\Driver;
use XC2S\Model\DriverCombo;
use XC2S\Model\Reaction;
use XC2S\Model\Weapon;

class ControllerDriverCombo extends ControllerMain
{
    public static function displayDriverCombo(): void
    {
        foreach (["Driver", "Weapon", "Reaction"] as $currentCategory) {
            ${"html" . $currentCategory} = '<label for="' . lcfirst($currentCategory) . '">' . " $currentCategory : </label>";

            ${"html" . $currentCategory} .= '<select name="' . lcfirst($currentCategory) . '">';

            ${"html" . $currentCategory} .= '<option value="__empty">-----</option>';

            $classPlace = "XC2S\Model\\$currentCategory";
            foreach ((new $classPlace('__temp'))->getListId() as $listValue) {
                ${"html" . $currentCategory} .= '<option value="' . $listValue . '"';

                if (isset($_POST[lcfirst($currentCategory)]) && $listValue === $_POST[lcfirst($currentCategory)])
                    ${"html" . $currentCategory} .= ' selected';

                ${"html" . $currentCategory} .= '>' . $listValue . '</option>';
            }

            ${"html" . $currentCategory} .= '</select>';

        }

        self::displayViewInBody("Driver Combo", "viewDriverCombo.php", [
            'htmlDriver' => $htmlDriver,
            'htmlWeaponClass' => $htmlWeapon,
            'htmlReaction' => $htmlReaction
        ]);
    }

    public static function displayList(): void
    {
        if (!isset($_POST['driver']) || !isset($_POST['weapon']) || !isset($_POST['reaction']))
            self::displayError("Il faut arriver à cette page normalement !");

        DriverCombo::getAvalaibleCombos($_POST['driver'], $_POST['weapon'], $_POST['reaction']);
        //self::displayView("viewList.php", ['combinations' => $combis]);
    }
}
