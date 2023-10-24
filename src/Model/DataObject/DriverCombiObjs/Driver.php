<?php

namespace XC2S\Model\DataObject\DriverCombiObjs;

enum Driver: string
{
    case EMPTY = '----------';
    case REX = 'Rex';
    case NIA = 'Nia';
    case TORA = 'Tora';
    case MORAG = 'Mòrag';
    case ZEKE = 'Zeke';

    public static function fromName(string $name): Driver
    {
        foreach (self::cases() as $case)
            if ($name === $case->name)
                return $case;
        throw new \ValueError("$name is not a valid backing value for enum " . self::class);
    }
}
