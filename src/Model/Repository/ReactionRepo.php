<?php

namespace XC2S\Model\Repository;

use XC2S\Model\DataObject\Reaction;
use XC2S\Model\DataObject\AbstractDataObject;

class ReactionRepo extends AbstractRepository
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    protected function getTableName(): string
    {
        return 'X_Reaction';
    }

    protected function getPrimaryKey(): string
    {
        return 'name';
    }

    public function constructFromArray(array $dataObjectArray): AbstractDataObject
    {
        return new Reaction(
            $dataObjectArray['name'],
        );
    }

    protected function getColumnNames(): array
    {
        return [
            'name',
        ];
    }
}
