<?php

namespace XC2S\Model;

class DriverCombo extends AbstractModel
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

    public function formatTableau(): array
    {
        return [
            'driver' => $this->driver,
            'reaction' => $this->reaction,
            'weaponClass' => $this->weaponClass
        ];
    }

    protected function getNomTable(): string
    {
        return 'X_DriverCombo';
    }

    protected function getClePrimaire(): string
    {
        return 'oeuf';
    }
}
