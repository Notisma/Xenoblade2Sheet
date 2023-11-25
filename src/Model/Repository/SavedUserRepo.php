<?php

namespace XC2S\Model\Repository;

use XC2S\Model\DataObject\AbstractDataObject;
use XC2S\Model\DataObject\SavedUser;

class SavedUserRepo extends AbstractRepository
{
    protected function getTableName(): string
    {
        return "X_SavedUser";
    }

    protected function getPrimaryKeyName(): string
    {
        return "login";
    }

    protected function getColumnNames(): array
    {
        return [
            'login',
            'vote'
        ];
    }

    public function constructFromArray(array $dataObjectArray): AbstractDataObject
    {
        return new SavedUser(
            $dataObjectArray['login'],
            $dataObjectArray['vote']
        );
    }
}
