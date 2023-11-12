<?php

namespace XC2S\Configuration;

use PDO;

class DatabaseConnection
{
    private PDO $pdo;
    private static ?DatabaseConnection $instance = null;

    public static function getPdo(): PDO
    {
        return self::getInstance()->pdo;
    }

    public function __construct()
    {
        $hostname = DatabaseConfiguration::getHostName();
        $port = DatabaseConfiguration::getPort();
        $databaseName = DatabaseConfiguration::getDataBase();
        $login = DatabaseConfiguration::getLogin();
        $password = DatabaseConfiguration::getPassWord();

        $this->pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$databaseName", $login, $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private static function getInstance(): DatabaseConnection
    {
        if (is_null(self::$instance))
            self::$instance = new DatabaseConnection();
        return self::$instance;
    }
}
