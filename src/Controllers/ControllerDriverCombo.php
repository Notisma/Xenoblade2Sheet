<?php

namespace XC2S\Controllers;

use XC2S\Model\DataObject\Driver;
use XC2S\Model\DataObject\DriverCombination;
use XC2S\Model\DataObject\Reaction;
use XC2S\Model\DataObject\Weapon;

class ControllerDriverCombo extends ControllerMain
{
    public static function displayDriverCombo(): void
    {
        DriverCombination::fillDatabase();

        foreach (["Driver", "Weapon", "Reaction"] as $currentCategory) {
            ${"html" . $currentCategory} = '<label for="' . lcfirst($currentCategory) . '">' . " $currentCategory : </label>";

            ${"html" . $currentCategory} .= '<select name="' . lcfirst($currentCategory) . '">';

            $classPlace = "XC2S\Model\DataObject\DriverCombiObjs\\$currentCategory";

            foreach ($classPlace::cases() as $enumValue) {
                ${"html" . $currentCategory} .= '<option value="' . $enumValue->name . '"';

                if (isset($_POST[lcfirst($currentCategory)]) && $enumValue->name === $_POST[lcfirst($currentCategory)])
                    ${"html" . $currentCategory} .= ' selected';

                ${"html" . $currentCategory} .= '>' . $enumValue->value . '</option>';
            }

            ${"html" . $currentCategory} .= '</select>';

        }

        self::displayViewInBody("Driver Combo", "viewDriverCombo.php", [
            'htmlDriver' => $htmlDriver,
            'htmlWeaponClass' => $htmlWeaponClass,
            'htmlReaction' => $htmlReaction
        ]);


//        session_start();
    }

    public static function displayList(): void
    {
        if (!isset($_POST['driver']) || !isset($_POST['weaponClass']) || !isset($_POST['reaction']))
            self::displayError("Il faut arriver à cette page normalement !");

        $testCombi = new DriverCombination(Driver::fromName($_POST['driver']), Weapon::fromName($_POST['weaponClass']), Reaction::fromName($_POST['reaction']), false);
        $combis = $testCombi->testCompatibility();

        self::displayView("viewList.php", ['combinations' => $combis]);
    }
}
