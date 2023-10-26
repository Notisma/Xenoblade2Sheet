<?php

namespace XC2S\Model;

use XC2S\Configuration\DatabaseConnection;

class DriverCombo extends AbstractModel
{
    public string $driver;
    public string $reaction;
    public string $weaponClass;

    public function __construct(string $driver, string $reaction, string $weaponClass)
    {
        $this->driver = $driver;
        $this->reaction = $reaction;
        $this->weaponClass = $weaponClass;
    }

    public function formatTableau(): array
    {
        return [
            'driver' => $this->driver,
            'reaction' => $this->reaction,
            'weaponClass' => $this->weaponClass
        ];
    }

    public static function getAvalaibleCombos(string $driver, string $reaction, string $weaponClass)
    {
        foreach (['driver', 'reaction', 'weaponClass'] as $parameter) {
            $$parameter = ($$parameter != "__empty") ? " AND $parameter = :${$parameter}Tag" : "";
        }
        $sql = "SELECT * FROM X_DriverCombo WHERE 1" . $driver . $reaction . $weaponClass . ";";
        $prep = DatabaseConnection::getPdo()->prepare($sql);
        $prep->execute([
            'driverTag' => $driver
        ]);
        foreach ($prep as $tuple)
            print_r($tuple);
    }

    protected function getTableName(): string
    {
        return 'X_DriverCombo';
    }

    protected function getPrimaryKey(): string
    {
        return 'oeuf';
    }
}
