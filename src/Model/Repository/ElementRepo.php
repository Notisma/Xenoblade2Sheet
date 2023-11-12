<?php

namespace XC2S\Model\Repository;

use XC2S\Model\DataObject\Element;
use XC2S\Model\DataObject\AbstractDataObject;

class ElementRepo extends AbstractRepository
{
    protected function getTableName(): string
    {
        return 'X_Element';
    }

    protected function getPrimaryKeyName(): string
    {
        return 'name';
    }

    public function constructFromArray(array $dataObjectArray): AbstractDataObject
    {
        return new Element(
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
