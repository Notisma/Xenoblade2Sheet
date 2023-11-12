<?php

namespace XC2S\Model\DataObject;

class DriverCombo extends AbstractDataObject
{
    public string $driver;
    public string $reaction;
    public string $weaponClass;

    public function __construct(string $driver, string $reaction, string $weaponClass)
    {
        $this->driver = $driver;
        $this->reaction = $reaction;
        $this->weaponClass = $weaponClass;
    }

    public function toArray(): array
    {
        return [
            'driver' => $this->driver,
            'reaction' => $this->reaction,
            'weaponClass' => $this->weaponClass
        ];
    }

    public function getPrimKeyValue(): string
    {
        return "egg";
    }
}
