<?php

namespace XC2S\Model\DataObject;

class UserDriver extends AbstractDataObject
{
    public int $id;
    public string $driverName;
    public int $blade1;
    public int $blade2;
    public int $blade3;

    public function __construct(int $id, string $driverName, int $blade1, int $blade2, int $blade3)
    {
        $this->id = $id;
        $this->driverName = $driverName;
        $this->blade1 = $blade1;
        $this->blade2 = $blade2;
        $this->blade3 = $blade3;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'driverName' => $this->driverName,
            'blade1' => $this->blade1,
            'blade2' => $this->blade2,
            'blade3' => $this->blade3,
        ];
    }

    public function getPrimKeyValue(): int
    {
        return $this->id;
    }
}