<?php

namespace XC2S\Model\DataObject;

class UserTeam extends AbstractDataObject
{
    public int $idTeam;
    public string $label;
    public string $login;
    public ?int $driver1;
    public ?int $driver2;
    public ?int $driver3;

    public function __construct(int $idTeam, string $label, string $login, ?int $driver1, ?int $driver2, ?int $driver3)
    {
        $this->idTeam = $idTeam;
        $this->label = $label;
        $this->login = $login;
        $this->driver1 = $driver1;
        $this->driver2 = $driver2;
        $this->driver3 = $driver3;
    }


    public function toArray(): array
    {
        return [
            'idTeam' => $this->idTeam,
            'label' => $this->label,
            'login' => $this->login,
            'driver1' => $this->driver1,
            'driver2' => $this->driver2,
            'driver3' => $this->driver3,
        ];
    }

    public function getPrimKeyValue(): int
    {
        return $this->idTeam;
    }
}
