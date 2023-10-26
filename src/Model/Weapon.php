<?php

namespace XC2S\Model;

class Weapon extends AbstractModel
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

    protected function getTableName(): string
    {
        return 'X_Weapon';
    }

    protected function getPrimaryKey(): string
    {
        return 'name';
    }
}
