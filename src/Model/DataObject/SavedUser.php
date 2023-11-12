<?php

namespace XC2S\Model\DataObject;

class SavedUser extends AbstractDataObject
{
    public string $login;

    public function __construct(string $login)
    {
        $this->login = $login;
    }

    public function toArray(): array
    {
        return [
            'login' => $this->login
        ];
    }

    public function getPrimKeyValue(): string
    {
        return $this->login;
    }
}