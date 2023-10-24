<?php

namespace XC2S\Model\DataObject\DriverCombiObjs;

enum WeaponClass: string
{
    case EMPTY = '----------';
    case GREATAXE = 'Greataxe';
    case MEGALANCE = 'Megalance';
    case ETHER_CANNON = 'Ether Cannon';
    case SHIELD_HAMMER = 'Shield Hammer';
    case CHROMA_KATANA = 'Chroma Katana';
    case BITBALL = 'Bitball';
    case KNUCKLE_CLAWS = 'Knuckle Claws';
    case SEPARATOR = '---Specifics---';
    case AEGIS_SWORD = 'Aegis Sword';
    case CATALYST_SCIMITAR = 'Catalyst Scimitar';
    case TWIN_RINGS = 'Twin Rings';
    case WHIPSWORDS = 'Whipswords';
    case BIG_BANG_EDGE = 'Big Bang Edge';
    case DUAL_SCYTHES = 'Dual Scythes';
    case DRILL_SHIELD = 'Drill Shield';
    case MECH_ARMS = 'Mech Arms';
    case VARIABLE_SABER = 'Variable Saber';

    public static function fromName(string $name): WeaponClass
    {
        foreach (self::cases() as $case)
            if ($name === $case->name)
                return $case;
        throw new \ValueError("$name is not a valid backing value for enum " . self::class);
    }
}
