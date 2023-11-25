<?php

namespace XC2S\Controllers;

use XC2S\Lib\UserConnection;
use XC2S\Model\DataObject\SavedUser;
use XC2S\Model\Repository\SavedUserRepo;

class ControllerVote extends ControllerMain
{
    public static function displayPinguinVote(): void
    {
        if (ControllerTeamBuilder::userLoggedOut()) return;

        self::displayViewInBody("Vote", 'vote/viewVote.php');
    }

    public static function registerVote(): void
    {
        if (ControllerTeamBuilder::userLoggedOut()) return;

        if (!isset($_POST['pp'])) {
            self::displayError("Il faut faire un choix !");
            return;
        }
        $newVote = $_POST['pp'];

        $user = (new SavedUserRepo())->getObjectFromPrimaryKey(UserConnection::getLoginConnectedUser());
        $prevVote = $user->vote;

        $user->vote = $newVote;
        (new SavedUserRepo())->updateObject($user);

        if ($prevVote) echo "<p>Vote mis-à-jour (de $prevVote à $newVote) ! (eh non on vote pas 2 fois)";
        else echo "<p>Merci d'avoir voté $newVote !</p>";
    }
}