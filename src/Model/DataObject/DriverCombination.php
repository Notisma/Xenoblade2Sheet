<?php

namespace XC2S\Model\DataObject;

use XC2S\Model\DataObject\DriverCombiObjs\Driver;
use XC2S\Model\DataObject\DriverCombiObjs\Reaction;
use XC2S\Model\DataObject\DriverCombiObjs\WeaponClass;

class DriverCombination
{
    public Driver $driver;
    public WeaponClass $weapon;
    public Reaction $react;

    public static array $combinations = array();

    function __construct(Driver $d, WeaponClass $w, Reaction $r, bool $isRealCombi)
    {
        $this->driver = $d;
        $this->weapon = $w;
        $this->react = $r;

        if ($isRealCombi) DriverCombination::$combinations[] = $this;
    }

    /**
     * Call this function on an user-sent combination, to get the corresponding combinations from $combinations.
     * @return DriverCombination[]
     */
    public function testCompatibility(): array
    {
        $combis = array();
        foreach (DriverCombination::$combinations as $combi) {
            if (($this->driver === Driver::EMPTY || $this->driver === $combi->driver)
                && ($this->weapon === WeaponClass::EMPTY || $this->weapon === $combi->weapon)
                && ($this->react === Reaction::EMPTY || $this->react === $combi->react)) {
                $combis[] = $combi;
            }
        }
        return $combis;
    }

    public function __toString()
    {
        return $this->driver->value . " - " . $this->weapon->value . " - " . $this->react->value . "<br/>";
    }

    public static function fillDatabase(): void
    {
        new DriverCombination(Driver::REX, WeaponClass::MEGALANCE, Reaction::BREAK, true);
        new DriverCombination(Driver::REX, WeaponClass::CHROMA_KATANA, Reaction::BREAK, true);
        new DriverCombination(Driver::REX, WeaponClass::AEGIS_SWORD, Reaction::TOPPLE, true);
        new DriverCombination(Driver::REX, WeaponClass::GREATAXE, Reaction::LAUNCH, true);
        new DriverCombination(Driver::REX, WeaponClass::BIG_BANG_EDGE, Reaction::LAUNCH, true);
        new DriverCombination(Driver::REX, WeaponClass::DUAL_SCYTHES, Reaction::SMASH, true);

        new DriverCombination(Driver::NIA, WeaponClass::TWIN_RINGS, Reaction::BREAK, true);
        new DriverCombination(Driver::NIA, WeaponClass::ETHER_CANNON, Reaction::BREAK, true);
        new DriverCombination(Driver::NIA, WeaponClass::BITBALL, Reaction::BREAK, true);
        new DriverCombination(Driver::NIA, WeaponClass::GREATAXE, Reaction::TOPPLE, true);
        new DriverCombination(Driver::NIA, WeaponClass::KNUCKLE_CLAWS, Reaction::LAUNCH, true);

        new DriverCombination(Driver::TORA, WeaponClass::VARIABLE_SABER, Reaction::BREAK, true);
        new DriverCombination(Driver::TORA, WeaponClass::DRILL_SHIELD, Reaction::TOPPLE, true);
        new DriverCombination(Driver::TORA, WeaponClass::VARIABLE_SABER, Reaction::LAUNCH, true);
        new DriverCombination(Driver::TORA, WeaponClass::MECH_ARMS, Reaction::SMASH, true);

        new DriverCombination(Driver::MORAG, WeaponClass::WHIPSWORDS, Reaction::BREAK, true);
        new DriverCombination(Driver::MORAG, WeaponClass::ETHER_CANNON, Reaction::BREAK, true);
        new DriverCombination(Driver::MORAG, WeaponClass::KNUCKLE_CLAWS, Reaction::BREAK, true);
        new DriverCombination(Driver::MORAG, WeaponClass::SHIELD_HAMMER, Reaction::TOPPLE, true);
        new DriverCombination(Driver::MORAG, WeaponClass::CHROMA_KATANA, Reaction::SMASH, true);
        new DriverCombination(Driver::MORAG, WeaponClass::MEGALANCE, Reaction::SMASH, true);

        new DriverCombination(Driver::ZEKE, WeaponClass::ETHER_CANNON, Reaction::BREAK, true);
        new DriverCombination(Driver::ZEKE, WeaponClass::KNUCKLE_CLAWS, Reaction::TOPPLE, true);
        new DriverCombination(Driver::ZEKE, WeaponClass::GREATAXE, Reaction::TOPPLE, true);
        new DriverCombination(Driver::ZEKE, WeaponClass::SHIELD_HAMMER, Reaction::LAUNCH, true);
        new DriverCombination(Driver::ZEKE, WeaponClass::BIG_BANG_EDGE, Reaction::LAUNCH, true);
        new DriverCombination(Driver::ZEKE, WeaponClass::MEGALANCE, Reaction::SMASH, true);
    }
}
