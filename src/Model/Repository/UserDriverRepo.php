<?php

namespace XC2S\Model\Repository;

use XC2S\Model\DataObject\AbstractDataObject;
use XC2S\Model\DataObject\UserDriver;

class UserDriverRepo extends AbstractRepository
{

    protected function getTableName(): string
    {
        return "X_UserDriver";
    }

    protected function getPrimaryKeyName(): string
    {
        return "id";
    }

    protected function getColumnNames(): array
    {
        return [
            'id',
            'driverName',
            'blade1',
            'blade2',
            'blade3',
        ];
    }

    public function constructFromArray(array $dataObjectArray): AbstractDataObject
    {
        return new UserDriver(
            $dataObjectArray['id'],
            $dataObjectArray['driverName'],
            $dataObjectArray['blade1'],
            $dataObjectArray['blade2'],
            $dataObjectArray['blade3'],
        );
    }
}