<?php

namespace XC2S\Controllers;

use XC2S\Lib\UserConnection;
use XC2S\Model\DataObject\SavedUser;
use XC2S\Model\Repository\SavedUserRepo;

class ControllerConnection extends ControllerMain
{
    //---------------DISPLAY---------------
    public static function displayConnectionPage(): void
    {
        self::displayViewInBody("Connection", "user/viewConnectionForm.php");
    }

    public static function displayUserDetails(): void
    {
        $user = (new SavedUserRepo())->getObjectFromPrimaryKey(UserConnection::getLoginConnectedUser());
        self::displayViewInBody("Account details", "user/viewDetails.php", [
            'user' => $user
        ]);
    }


    //---------------PUBLIC FACTORY-------------
    public static function logInOrSignUp(): void
    {
        if (!isset($_GET['login']))
            self::displayError("Il faut renseigner un utilisateur.");
        else {
            $login = $_GET['login'];

            if ((new SavedUserRepo())->getObjectFromPrimaryKey($login) == null) {
                self::signUp($login);
            } else {
                self::logIn($login);
            }
        }
    }

    public static function logOut(): void
    {
        UserConnection::disconnect();
        self::displayIndex();
    }

    //---------------PRIVATE FACTORY-------------
    private static function logIn(string $login): void
    {
        UserConnection::connect($login);
        self::displayIndex();
    }

    private static function signUp(string $login): void
    {
        $userDO = new SavedUser($login, null);
        (new SavedUserRepo())->createObject($userDO);
        self::logIn($login);
    }
}
