<?php

namespace XC2S\Controllers;

use XC2S\Lib\UserConnection;
use XC2S\Model\DataObject\UserBlade;
use XC2S\Model\Repository\BladeRepo;
use XC2S\Model\Repository\UserBladeRepo;

class ControllerTeamBuilder extends ControllerMain
{
    //---------------DISPLAY---------------
    public static function displayBuilderIndex(): void
    {
        if (self::userLoggedOut()) return;

        self::displayViewInBody("TeamBuilder", 'teamBuilder/viewBuilderIndex.php');
    }

    public static function displayBladeManager(): void
    {
        if (self::userLoggedOut()) return;
        $login = UserConnection::getLoginConnectedUser();

        self::displayViewInBody("Blade Manager", 'teamBuilder/viewUserBladeSelection.php', [
            'groupedUserBlades' => (new UserBladeRepo())->getBladesOfUserGrouped($login),
            'nonUserBlades' => (new BladeRepo())->getBladesThatUserDoesntHave($login),
        ]);
    }

    public static function displayBladeDetails(): void
    {
        if (self::userLoggedOut()) return;

        if (!isset($_GET['ublade_id']))
            self::displayError("Il faut renseigner une lame");
        else {
            $bladeid = $_GET['ublade_id'];
            $blade = (new UserBladeRepo())->getObjectFromPrimaryKey($bladeid);
            if (is_null($blade))
                self::displayError("La lame n'existe pas");
            else
                self::displayViewInBody("Blade Details - $blade->bladeName", 'teamBuilder/viewBladeDetails.php', [
                    'ublade' => $blade
                ]);
        }
    }

    //--------------PUBLIC FACTORY--------------
    public static function addBladeToUser(): void
    {
        if (self::userLoggedOut()) return;
        $login = UserConnection::getLoginConnectedUser();

        if (!isset($_GET['blade']))
            self::displayError("Il faut renseigner une lame");
        else {
            $blade = $_GET['blade'];
            if (!(new BladeRepo())->bladeExists($blade) || (new UserBladeRepo())->userHasBlade($login, $blade))
                self::displayError("Cette lame n'existe pas, ou vous l'avez déjà");
            else {
                $newUBlade = new UserBlade(-1, $login, null, $blade);
                (new UserBladeRepo())->createObject($newUBlade);
                self::displayBladeManager();
            }
        }
    }

    public static function changeBondedDriver(): void
    {
        if (self::userLoggedOut()) return;
        $login = UserConnection::getLoginConnectedUser();

        if (!isset($_GET['ublade_id'], $_POST['new_driver']))
            self::displayError("Il faut renseigner une lame et son nouveau driver");
        else {
            $bladeUserDO = (new UserBladeRepo())->getObjectFromPrimaryKey($_GET['ublade_id']);
            if (!isset($bladeUserDO))
                self::displayError("Cette user lame n'existe pas");
            else {
                $bladeUserDO->bondedDriver = $_POST['new_driver'];
                (new UserBladeRepo())->updateObject($bladeUserDO);
                self::displayBladeManager();
            }
        }
    }


    //--------------PRIVATE FACTORY-------------
    private static function userLoggedOut(): bool
    {
        if (UserConnection::isConnected()) return false;
        else {
            self::displayViewInBody("TeamBuilder", 'teamBuilder/viewBuilderLoggedOut.php');
            return true;
        }
    }
}
