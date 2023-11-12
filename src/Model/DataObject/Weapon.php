<?php

namespace XC2S\Model\DataObject;

class Weapon extends AbstractDataObject
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name
        ];
    }
}
