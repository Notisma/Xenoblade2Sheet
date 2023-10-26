<?php

namespace XC2S\Model;

use XC2S\Configuration\DatabaseConnection;

abstract class AbstractModel
{
    /*
    public abstract function formatTableau(): array;

    protected abstract function getNomTable(): string;

    protected abstract function getNomsColonnes(): array;

    protected abstract function getClePrimaire(): string;

    public abstract function construireDepuisTableau(array $DataObjectTableau): AbstractModel;


    public function getListeObjet(): ?array
    {
        $sql = 'SELECT * FROM ' . $this->getNomTable();
        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->query($sql);
        foreach ($pdoStatement as $item) {
            $listeObjet[] = $this->construireDepuisTableau($item);
        }
        return $listeObjet;
    }

    public function getListeID()
    {
        $sql = 'SELECT * FROM ' . $this->getNomTable();
        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->query($sql);
        foreach ($pdoStatement as $item) {
            $listeObjet[] = $item[$this->getClePrimaire()];
        }
        return $listeObjet;
    }

    public function getObjectParClePrimaire($clePrimaire): ?AbstractModel
    {
        $sql = "SELECT * FROM " . $this->getNomTable() . " WHERE " . $this->getClePrimaire() . "=:Tag ";
        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->prepare($sql);
        $values = array("Tag" => $clePrimaire);
        $pdoStatement->execute($values);
        $objet = $pdoStatement->fetch();
        if (!$objet) {
            return null;
        }
        return $this->construireDepuisTableau($objet);
    }

    // ----- CRUD -----

    public function createObject(AbstractModel $objet): void
    {
        $sql = "INSERT INTO " . $this->getNomTable() . " VALUES (";
        foreach ($this->getNomsColonnes() as $nomColonne) {
            if ($nomColonne != $this->getNomsColonnes()[0]) {
                $sql .= ",";
            }
            $sql .= ":" . $nomColonne . "Tag";
            $values[$nomColonne . "Tag"] = $objet->formatTableau()[$nomColonne];
        }
        $sql .= ")";
        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->prepare($sql);
        $pdoStatement->execute($values);
    }

    public function changeObject(AbstractModel $objet): void
    {
        $sql = "UPDATE " . $this->getNomTable() . " SET ";
        foreach ($this->getNomsColonnes() as $nomColonne) {
            if ($nomColonne != $this->getNomsColonnes()[0])
                $sql .= ",";
            $sql .= "$nomColonne = :$nomColonne" . "Tag";
            $values[$nomColonne . "Tag"] = $objet->formatTableau()[$nomColonne];
        }
        $clePrim = $this->getClePrimaire();
        $sql .= " WHERE $clePrim = :$clePrim" . "Tag;";
        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->prepare($sql);
        $pdoStatement->execute($values);
    }

    public function deleteObject($clePrimaire): void
    {
        $sql = "DELETE FROM " . $this->getNomTable() . " WHERE " . $this->getClePrimaire() . "=:Tag ";
        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->prepare($sql);
        $values = array("Tag" => $clePrimaire);
        $pdoStatement->execute($values);
    }
    */
}
