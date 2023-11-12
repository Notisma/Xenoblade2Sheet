<?php

namespace XC2S\Model\Repository;

use XC2S\Model\DataObject\AbstractDataObject;
use XC2S\Model\DataObject\Driver;

class DriverRepo extends AbstractRepository
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    protected function getTableName(): string
    {
        return 'X_Driver';
    }

    protected function getPrimaryKey(): string
    {
        return 'name';
    }

    protected function getColumnNames(): array
    {
        return [
            'name',
        ];
    }

    public function constructFromArray(array $dataObjectArray): AbstractDataObject
    {
        return new Driver(
            $dataObjectArray['name'],
        );
    }
}
