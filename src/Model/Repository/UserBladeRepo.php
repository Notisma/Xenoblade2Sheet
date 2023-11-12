<?php

namespace XC2S\Model\Repository;

use XC2S\Model\DataObject\AbstractDataObject;
use XC2S\Model\DataObject\UserBlade;

class UserBladeRepo extends AbstractRepository
{
    public function getBladesOfUser(string $login): array
    {
        $userblades = self::getDataObjectList();
        $correspondingUB = array();

        foreach ($userblades as $b)
            if ($b->loginUser === $login)
                $correspondingUB[] = $b;

        return $correspondingUB;
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