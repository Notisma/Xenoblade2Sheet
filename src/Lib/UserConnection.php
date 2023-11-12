<?php

namespace XC2S\Lib;

class UserConnection
{
    // L'user connecté sera enregistré en session, associé à la clef suivante :
    private static string $connectionKey = "_connectedUser";

    public static function connect(string $loginUtilisateur): void
    {
        Session::getInstance()->register(self::$connectionKey, $loginUtilisateur);
    }

    public static function isConnected(): bool
    {
        //echo (isset($_SESSION[self::$cleConnexion])) ? $_SESSION[self::$clefConnexion] : "pas co";
        return Session::getInstance()->contains(self::$connectionKey);
    }

    public static function disconnect(): void
    {
        Session::getInstance()->delete(self::$connectionKey);
    }

    public static function getLoginConnectedUser(): ?string
    {
        return Session::getInstance()->read(self::$connectionKey) ?? null;
    }

    public static function isCurrentUser(string $login): bool
    {
        return self::getLoginConnectedUser() === $login;
    }
}
