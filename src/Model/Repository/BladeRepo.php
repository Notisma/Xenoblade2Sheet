<?php

namespace XC2S\Model\Repository;

use XC2S\Configuration\DatabaseConnection;
use XC2S\Model\DataObject\Blade;

class BladeRepo extends AbstractRepository
{
    public function getBladesThatUserDoesntHave(string $login): array
    {
        $sql = "SELECT *
                FROM X_Blade
                WHERE name NOT IN (
                    SELECT bladeName
                    FROM X_UserBlade
                    WHERE loginUser = :loginTag
                );
        ";
        $pdo = DatabaseConnection::getPdo()->prepare($sql);
        $pdo->execute(['loginTag' => $login]);
        return $this->dataObjectsFromStatement($pdo);
    }

    public function bladeExists(string $bladeName): bool
    {
        $blades = self::getDataObjectList();

        foreach ($blades as $b)
            if ($b->name === $bladeName)
                return true;

        return false;
    }

    protected function getTableName(): string
    {
        return "X_Blade";
    }

    protected function getPrimaryKeyName(): string
    {
        return "name";
    }

    protected function getColumnNames(): array
    {
        return [
            'name',
            'element',
            'weaponClass',
        ];
    }

    public function constructFromArray(array $dataObjectArray): Blade
    {
        return new Blade(
            $dataObjectArray['name'],
            $dataObjectArray['element'],
            $dataObjectArray['weaponClass'],
        );
    }
}
