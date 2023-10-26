<?php

namespace XC2S\Model;

class Reaction extends AbstractModel
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function formatTableau(): array
    {
        return [
            'name' => $this->name
        ];
    }

    protected function getNomTable(): string
    {
        return 'X_Reaction';
    }

    protected function getClePrimaire(): string
    {
        return 'name';
    }
}
