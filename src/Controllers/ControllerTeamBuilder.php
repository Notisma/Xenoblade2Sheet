<?php

namespace XC2S\Controllers;

use XC2S\Lib\UserConnection;
use XC2S\Model\DataObject\UserTeam;
use XC2S\Model\Repository\UserTeamRepo;

class ControllerTeamBuilder extends ControllerMain
{
    //---------------DISPLAY---------------
    public static function displayBuilderIndex(): void
    {
        if (self::userLoggedOut()) return;

        self::displayViewInBody("TeamBuilder", 'teamBuilder/viewBuilderIndex.php');
    }

    public static function displayTeams(): void
    {
        if (self::userLoggedOut()) return;

        self::displayViewInBody("Équipes", "teamBuilder/viewTeams.php", [
            'teams' => (new UserTeamRepo())->getTeamsOfUser(UserConnection::getLoginConnectedUser())
        ]);
    }

    public static function displayTeamDetails(): void
    {
        if (self::userLoggedOut()) return;

        if (!isset($_GET['team'])) self::displayError("renseigner team");
        else {
            $teamDO = (new UserTeamRepo())->getObjectFromPrimaryKey($_GET['team']);
            $login = UserConnection::getLoginConnectedUser();

            if (is_null($teamDO))
                self::displayError("Cette team n'existe pas");
            else if (!(new UserTeamRepo())->userHasUserTeam($login, $teamDO->idTeam))
                self::displayError("Vous n'avez pas cette team");
            else
                self::displayViewInBody("Équipe", "teamBuilder/viewTeamDetails.php", [
                    'team' => $teamDO
                ]);
        }
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

    public static function createTeam(): void
    {
        if (self::userLoggedOut()) return;
        else if (!isset($_POST['teamLabel'])) self::displayError("Label team non renseigné");
        else {
            $t = new UserTeam(-1, $_POST['teamLabel'], UserConnection::getLoginConnectedUser(), null, null, null);
            (new UserTeamRepo())->createObjectIfAutoIncr($t);
            self::displayTeams();
        }
    }
}
