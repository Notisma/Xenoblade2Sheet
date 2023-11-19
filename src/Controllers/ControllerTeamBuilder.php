<?php

namespace XC2S\Controllers;

use XC2S\Lib\UserConnection;

class ControllerTeamBuilder extends ControllerMain
{
    //---------------DISPLAY---------------
    public static function displayBuilderIndex(): void
    {
        if (self::userLoggedOut()) return;

        self::displayViewInBody("TeamBuilder", 'teamBuilder/viewBuilderIndex.php');
    }


    //--------------PUBLIC FACTORY-------------
    public static function userLoggedOut(): bool
    {
        if (UserConnection::isConnected()) return false;
        else {
            self::displayViewInBody("TeamBuilder", 'teamBuilder/viewBuilderLoggedOut.php');
            return true;
        }
    }
}
