<?php

namespace XC2S\Model\Repository;

use XC2S\Configuration\DatabaseConnection;
use XC2S\Model\DataObject\AbstractDataObject;
use XC2S\Model\DataObject\UserBlade;

class UserBladeRepo extends AbstractRepository
{
    public function getBladesOfUserGrouped(string $login): array
    {
        $group = array();
        foreach ((new DriverRepo())->getIdList() as $driver)
            $group[$driver] = $this->getBladesOfUserByDriver($login, $driver);
        $group['Need to specify driver for :'] = $this->getBladesOfUserWithoutDriver($login);
        return $group;
    }

    public function getBladesOfUserByDriver(string $login, string $driverName): array
    {
        $sql = "SELECT *
                FROM X_UserBlade
                WHERE loginUser = :loginTag
                    AND bondedDriver = :driverTag;";
        $pdo = DatabaseConnection::getPdo()->prepare($sql);
        $pdo->execute(['loginTag' => $login, 'driverTag' => $driverName]);
        return $this->dataObjectsFromStatement($pdo);
    }

    public function getBladesOfUserWithoutDriver(string $login): array
    {
        $sql = "SELECT *
                FROM X_UserBlade
                WHERE loginUser = :loginTag
                    AND bondedDriver IS NULL;";
        $pdo = DatabaseConnection::getPdo()->prepare($sql);
        $pdo->execute(['loginTag' => $login]);
        return $this->dataObjectsFromStatement($pdo);
    }


    public function userHasBlade(string $login, string $bladeName): bool
    {
        $userblades = self::getDataObjectList();

        foreach ($userblades as $b)
            if ($b->bladeName === $bladeName && $b->loginUser === $login)
                return true;

        return false;
    }


    protected function getTableName(): string
    {
        return "X_UserBlade";
    }

    protected function getPrimaryKeyName(): string
    {
        return "id";
    }

    protected function getColumnNames(): array
    {
        return [
            'loginUser',
            'bondedDriver',
            'bladeName',
        ];
    }

    public function constructFromArray(array $dataObjectArray): AbstractDataObject
    {
        return new UserBlade(
            $dataObjectArray['id'],
            $dataObjectArray['loginUser'],
            $dataObjectArray['bondedDriver'],
            $dataObjectArray['bladeName'],
        );
    }
}