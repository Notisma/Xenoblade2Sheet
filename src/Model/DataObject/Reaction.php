<?php

namespace XC2S\Model\DataObject;

enum Reaction: string
{
    case EMPTY = '----------';
    case BREAK = 'Break';
    case TOPPLE = 'Topple';
    case LAUNCH = 'Launch';
    case SMASH = 'Smash';

    public static function fromName(string $name): Reaction
    {
        foreach (self::cases() as $case)
            if ($name === $case->name)
                return $case;
        throw new \ValueError("$name is not a valid backing value for enum " . self::class);
    }
}
