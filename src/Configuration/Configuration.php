<?php

namespace XC2S\Configuration;

class Configuration
{
    static private array $config = array(
        'hostname' => 'webinfo',
        'database' => 'izoretr',
        'port' => '3316',
        'login' => 'izoretr',
        'password' => ''
    );

    public static function getHostname(): string
    {
        return self::$config['hostname'];
    }

    public static function getDatabase(): string
    {
        return self::$config['database'];
    }

    public static function getLogin(): string
    {
        return self::$config['login'];
    }

    public static function getPassword(): string
    {
        return self::$config['password'];
    }

    public static function getPort(): string
    {
        return self::$config['port'];
    }
}