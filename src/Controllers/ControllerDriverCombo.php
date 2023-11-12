<?php

namespace XC2S\Controllers;

use XC2S\Model\Repository\DriverComboRepo;
use XC2S\Model\DataObject\DriverCombo;

class ControllerDriverCombo extends ControllerMain
{
    public static function displayDriverCombo(): void
    {
        foreach (["Driver", "Weapon", "Reaction"] as $currentCategory) {
            $code = "<label for='" . lcfirst($currentCategory) . "'>$currentCategory : </label>
                <select name='" . lcfirst($currentCategory) . "'>
                <option value='__empty'>-------</option>";

            $repositoryPlace = "XC2S\Model\Repository\\$currentCategory" . "Repo";
            foreach ((new $repositoryPlace('__temp'))->getIdList() as $listValue) {
                $code .= '<option value="' . $listValue . '"';

                if (isset($_POST[lcfirst($currentCategory)]) && $listValue === $_POST[lcfirst($currentCategory)])
                    $code .= ' selected';

                $code .= '>' . $listValue . '</option>';
            }
            $code .= '</select>';

            ${"html" . $currentCategory} = $code;
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

        DriverComboRepo::printAvalaibleCombos($_POST['driver'], $_POST['weapon'], $_POST['reaction']);
        //self::displayView("viewList.php", ['combinations' => $combis]);
    }
}
