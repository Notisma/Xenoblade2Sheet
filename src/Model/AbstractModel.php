<?php

namespace XC2S\Model;

use XC2S\Configuration\DatabaseConnection;

abstract class AbstractModel
{
    protected abstract function getTableName(): string;
    protected abstract function getPrimaryKey(): string;
    /*
    public abstract function formatTableau(): array;
    protected abstract function getNomsColonnes(): array;

    public abstract function construireDepuisTableau(array $DataObjectTableau): AbstractModel;


    public function getListeObject(): ?array
    {
        $sql = 'SELECT * FROM ' . $this->getNomTable();
        $pdoStatement = DatabaseConnection::getPdo()->query($sql);
        foreach ($pdoStatement as $item) {
            $listObject[] = $this->construireDepuisTableau($item);
        }
        return $listObject;
    }*/

    public function getListId(): array
    {
        $sql = 'SELECT * FROM ' . $this->getTableName();
        $pdoStatement = DatabaseConnection::getPdo()->query($sql);
        $listObject = array();
        foreach ($pdoStatement as $item)
            $listObject[] = $item[$this->getPrimaryKey()];
        return $listObject;
    }
/*
    public function getObjectParClePrimaire($clePrimaire): ?AbstractModel
    {
        $sql = "SELECT * FROM " . $this->getNomTable() . " WHERE " . $this->getClePrimaire() . "=:Tag ";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array("Tag" => $clePrimaire);
        $pdoStatement->execute($values);
        $object = $pdoStatement->fetch();
        if (!$object) {
            return null;
        }
        return $this->construireDepuisTableau($object);
    }

    // ----- CRUD -----

    public function createObject(AbstractModel $object): void
    {
        $sql = "INSERT INTO " . $this->getNomTable() . " VALUES (";
        foreach ($this->getNomsColonnes() as $nomColonne) {
            if ($nomColonne != $this->getNomsColonnes()[0]) {
                $sql .= ",";
            }
            $sql .= ":" . $nomColonne . "Tag";
            $values[$nomColonne . "Tag"] = $object->formatTableau()[$nomColonne];
        }
        $sql .= ")";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute($values);
    }

    public function changeObject(AbstractModel $object): void
    {
        $sql = "UPDATE " . $this->getNomTable() . " SET ";
        foreach ($this->getNomsColonnes() as $nomColonne) {
            if ($nomColonne != $this->getNomsColonnes()[0])
                $sql .= ",";
            $sql .= "$nomColonne = :$nomColonne" . "Tag";
            $values[$nomColonne . "Tag"] = $object->formatTableau()[$nomColonne];
        }
        $clePrim = $this->getClePrimaire();
        $sql .= " WHERE $clePrim = :$clePrim" . "Tag;";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute($values);
    }

    public function deleteObject($clePrimaire): void
    {
        $sql = "DELETE FROM " . $this->getNomTable() . " WHERE " . $this->getClePrimaire() . "=:Tag ";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array("Tag" => $clePrimaire);
        $pdoStatement->execute($values);
    }
    */
}
