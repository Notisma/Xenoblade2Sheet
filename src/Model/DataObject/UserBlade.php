<?php

namespace XC2S\Model\DataObject;

class UserBlade extends AbstractDataObject
{
    public int $id;
    public string $loginUser;
    public ?string $bondedDriver;
    public string $bladeName;

    public function __construct(int $id, string $loginUser, ?string $bondedDriver, string $bladeName)
    {
        $this->id = $id;
        $this->loginUser = $loginUser;
        $this->bondedDriver = $bondedDriver;
        $this->bladeName = $bladeName;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'loginUser' => $this->loginUser,
            'bondedDriver' => $this->bondedDriver,
            'bladeName' => $this->bladeName,
        ];
    }

    public function getPrimKeyValue(): int
    {
        return $this->id;
    }
}
