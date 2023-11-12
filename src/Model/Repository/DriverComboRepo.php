<?php

namespace XC2S\Model\Repository;

use XC2S\Configuration\DatabaseConnection;
use XC2S\Model\DataObject\AbstractDataObject;
use XC2S\Model\DataObject\DriverCombo;

class DriverComboRepo extends AbstractRepository
{
    public static function getAvalaibleCombos(string $driver, string $weaponClass, string $reaction): array
    {
        $combis = array();

        $params = array();
        foreach (['driver', 'weaponClass', 'reaction'] as $parameter) {
            if ($$parameter != "__empty") {
                $params["{$parameter}Tag"] = $$parameter;
                $$parameter =  " AND $parameter = :{$parameter}Tag";
            } else {
                $$parameter = "";
            }
        }
        $sql = "SELECT * FROM X_DriverCombo WHERE 1" . $driver . $weaponClass . $reaction . ";";
        $prep = DatabaseConnection::getPdo()->prepare($sql);

        $prep->execute($params);

        foreach ($prep as $tuple)
            $combis[] = "$tuple[driver] - $tuple[weaponClass] - $tuple[reaction]";

        return $combis;
    }

    protected function getTableName(): string
    {
        return 'X_DriverCombo';
    }

    protected function getPrimaryKey(): string
    {
        return 'oeuf';
    }

    protected function getColumnNames(): array
    {
        return [
            'driver',
            'reaction',
            'weaponClass',
        ];
    }

    public function constructFromArray(array $dataObjectArray): AbstractDataObject
    {
        return new DriverCombo(
            $dataObjectArray['driver'],
            $dataObjectArray['reaction'],
            $dataObjectArray['weaponClass'],
        );
    }
}
