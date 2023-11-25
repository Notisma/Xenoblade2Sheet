<?php

namespace XC2S\Model\DataObject;

class SavedUser extends AbstractDataObject
{
    public string $login;
    public ?string $vote;

    public function __construct(string $login, ?string $vote)
    {
        $this->login = $login;
        $this->vote = $vote;
    }

    public function toArray(): array
    {
        return [
            'login' => $this->login,
            'vote' => $this->vote
        ];
    }

    public function getPrimKeyValue(): string
    {
        return $this->login;
    }
}
