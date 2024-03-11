<?php

namespace XC2S\Model\Repository;

use XC2S\Configuration\DatabaseConnection;
use XC2S\Model\DataObject\AbstractDataObject;
use XC2S\Model\DataObject\UserTeam;

class UserTeamRepo extends AbstractRepository
{
    public function getTeamsOfUser(string $login): array
    {
        $sql = "
        SELECT *
        FROM X_UserTeam
        WHERE login = :loginTag
        ";
        $prep = DatabaseConnection::getPdo()->prepare($sql);
        $prep->execute([
            'loginTag' => $login
        ]);
        $arr = array();
        foreach ($prep as $row) $arr[] = $this->constructFromArray($row);
        return $arr;
    }

    public function userHasUserTeam(?string $login, int $idTeam): bool
    {
        $sql = "
        SELECT *
        FROM X_UserTeam
        WHERE login = :loginTag
            AND idTeam = :idTeamTag
        ";
        $prep = DatabaseConnection::getPdo()->prepare($sql);
        $prep->execute([
            'loginTag' => $login,
            'idTeamTag' => $idTeam
        ]);
        return $prep->fetch() != false;
    }

    protected function getTableName(): string
    {
        return "X_UserTeam";
    }

    protected function getPrimaryKeyName(): string
    {
        return "idTeam";
    }

    protected function getColumnNames(): array
    {
        return [
            'idTeam',
            'label',
            'login',
        ];
    }

    public function constructFromArray(array $dataObjectArray): AbstractDataObject
    {
        return new UserTeam(
            $dataObjectArray['idTeam'],
            $dataObjectArray['label'],
            $dataObjectArray['login'],
        );
    }
}
