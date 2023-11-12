<?php

namespace XC2S\Model\Repository;

use XC2S\Configuration\DatabaseConnection;
use XC2S\Model\DataObject\AbstractDataObject;

abstract class AbstractRepository
{
    protected abstract function getTableName(): string;

    protected abstract function getPrimaryKeyName(): string;

    protected abstract function getColumnNames(): array;

    public abstract function constructFromArray(array $dataObjectArray): AbstractDataObject;


    protected function dataObjectsFromStatement(\PDOStatement $pdoStatement): array
    {
        $listObject = array();
        foreach ($pdoStatement as $item) {
            $listObject[] = $this->constructFromArray($item);
        }
        return $listObject;
    }

    public function getDataObjectList(): ?array
    {
        $sql = 'SELECT * FROM ' . $this->getTableName();
        $pdo = DatabaseConnection::getPdo()->query($sql);
        return $this->dataObjectsFromStatement($pdo);
    }

    public function getIdList(): array
    {
        $sql = 'SELECT * FROM ' . $this->getTableName();
        $pdoStatement = DatabaseConnection::getPdo()->query($sql);
        $listObject = array();
        foreach ($pdoStatement as $item)
            $listObject[] = $item[$this->getPrimaryKeyName()];
        return $listObject;
    }

    public function getObjectFromPrimaryKey($primKeyValue): ?AbstractDataObject
    {
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKeyName() . "=:Tag ";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array("Tag" => $primKeyValue);
        $pdoStatement->execute($values);
        $object = $pdoStatement->fetch();
        if (!$object)
            return null;
        return $this->constructFromArray($object);
    }

    // ----- CRUD -----

    public function createObject(AbstractDataObject $object): void
    {
        $fields = "";
        $values = "";
        $tags = array();
        foreach ($this->getColumnNames() as $nomColonne) {
            if ($nomColonne != $this->getColumnNames()[0]) {
                $fields .= ", ";
                $values .= ", ";
            }
            $fields .= $nomColonne;
            $values .= ":" . $nomColonne . "Tag";
            $tags[$nomColonne . "Tag"] = $object->toArray()[$nomColonne];
        }
        $sql = "INSERT INTO " . $this->getTableName() . " ($fields) VALUES ($values);";

        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute($tags);
    }

    public function updateObject(AbstractDataObject $object): void
    {
        $sql = "UPDATE " . $this->getTableName() . " SET ";
        $tags = array();
        foreach ($this->getColumnNames() as $nomColonne) {
            if ($nomColonne != $this->getColumnNames()[0])
                $sql .= ", ";
            $sql .= "$nomColonne = :$nomColonne" . "Tag";
            $tags[$nomColonne . "Tag"] = $object->toArray()[$nomColonne];
        }
        $clePrim = $this->getPrimaryKeyName();
        $sql .= " WHERE $clePrim = :$clePrim" . "Tag;";

        if (!isset($tags["{$clePrim}Tag"]))
            $tags["{$clePrim}Tag"] = $object->getPrimKeyValue();
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute($tags);
    }

    public function deleteObject($primKeyValue): void
    {
        $sql = "DELETE FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKeyName() . "=:Tag ";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array("Tag" => $primKeyValue);
        $pdoStatement->execute($values);
    }
}
