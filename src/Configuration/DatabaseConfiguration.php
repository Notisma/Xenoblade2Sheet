<?php

namespace XC2S\Configuration;

use http\Exception\RuntimeException;

class DatabaseConfiguration
{

    static private array $iutConf = array(
        'hostname' => 'webinfo',
        'database' => 'izoretr',
        'port' => '3316',
        'login' => 'izoretr',
        'password' => ''
    );

    static private array $localConf = array(
        'hostname' => 'localhost',
        'database' => 'XC2S',
        'port' => '3306',
        'login' => 'notisma',
        'password' => ''
    );

    static private function getConfig(): array
    {
        if ($_SERVER["HTTP_HOST"] == "webinfo.iutmontp.univ-montp2.fr")
            return self::$iutConf;
        else if ($_SERVER['SERVER_PORT'] == 6942)
            return self::$localConf;
        else
            throw new RuntimeException("Configuration non-trouvée !");
    }

    public static function getHostname(): string
    {
        return self::getConfig()['hostname'];
    }

    public static function getDatabase(): string
    {
        return self::getConfig()['database'];
    }

    public static function getLogin(): string
    {
        return self::getConfig()['login'];
    }

    public static function getPassword(): string
    {
        return self::getConfig()['password'];
    }

    public static function getPort(): string
    {
        return self::getConfig()['port'];
    }
}
