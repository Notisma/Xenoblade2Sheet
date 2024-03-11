<?php

namespace XC2S\Model\DataObject;

class UserTeam extends AbstractDataObject
{
    public int $idTeam;
    public string $label;
    public string $login;

    public function __construct(int $idTeam, string $label, string $login)
    {
        $this->idTeam = $idTeam;
        $this->label = $label;
        $this->login = $login;
    }


    public function toArray(): array
    {
        return [
            'idTeam' => $this->idTeam,
            'label' => $this->label,
            'login' => $this->login,
        ];
    }

    public function getPrimKeyValue(): int
    {
        return $this->idTeam;
    }
}
