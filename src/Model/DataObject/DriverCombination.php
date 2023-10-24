<?php

namespace XC2S\Model\DataObject;

class DriverCombination
{
    public Driver $driver;
    public Weapon $weapon;
    public Reaction $react;

    public static array $combinations = array();

    function __construct(Driver $d, Weapon $w, Reaction $r, bool $isRealCombi)
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
                && ($this->weapon === Weapon::EMPTY || $this->weapon === $combi->weapon)
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
        new DriverCombination(Driver::REX, Weapon::MEGALANCE, Reaction::BREAK, true);
        new DriverCombination(Driver::REX, Weapon::CHROMA_KATANA, Reaction::BREAK, true);
        new DriverCombination(Driver::REX, Weapon::AEGIS_SWORD, Reaction::TOPPLE, true);
        new DriverCombination(Driver::REX, Weapon::GREATAXE, Reaction::LAUNCH, true);
        new DriverCombination(Driver::REX, Weapon::BIG_BANG_EDGE, Reaction::LAUNCH, true);
        new DriverCombination(Driver::REX, Weapon::DUAL_SCYTHES, Reaction::SMASH, true);

        new DriverCombination(Driver::NIA, Weapon::TWIN_RINGS, Reaction::BREAK, true);
        new DriverCombination(Driver::NIA, Weapon::ETHER_CANNON, Reaction::BREAK, true);
        new DriverCombination(Driver::NIA, Weapon::BITBALL, Reaction::BREAK, true);
        new DriverCombination(Driver::NIA, Weapon::GREATAXE, Reaction::TOPPLE, true);
        new DriverCombination(Driver::NIA, Weapon::KNUCKLE_CLAWS, Reaction::LAUNCH, true);

        new DriverCombination(Driver::TORA, Weapon::VARIABLE_SABER, Reaction::BREAK, true);
        new DriverCombination(Driver::TORA, Weapon::DRILL_SHIELD, Reaction::TOPPLE, true);
        new DriverCombination(Driver::TORA, Weapon::VARIABLE_SABER, Reaction::LAUNCH, true);
        new DriverCombination(Driver::TORA, Weapon::MECH_ARMS, Reaction::SMASH, true);

        new DriverCombination(Driver::MORAG, Weapon::WHIPSWORDS, Reaction::BREAK, true);
        new DriverCombination(Driver::MORAG, Weapon::ETHER_CANNON, Reaction::BREAK, true);
        new DriverCombination(Driver::MORAG, Weapon::KNUCKLE_CLAWS, Reaction::BREAK, true);
        new DriverCombination(Driver::MORAG, Weapon::SHIELD_HAMMER, Reaction::TOPPLE, true);
        new DriverCombination(Driver::MORAG, Weapon::CHROMA_KATANA, Reaction::SMASH, true);
        new DriverCombination(Driver::MORAG, Weapon::MEGALANCE, Reaction::SMASH, true);

        new DriverCombination(Driver::ZEKE, Weapon::ETHER_CANNON, Reaction::BREAK, true);
        new DriverCombination(Driver::ZEKE, Weapon::KNUCKLE_CLAWS, Reaction::TOPPLE, true);
        new DriverCombination(Driver::ZEKE, Weapon::GREATAXE, Reaction::TOPPLE, true);
        new DriverCombination(Driver::ZEKE, Weapon::SHIELD_HAMMER, Reaction::LAUNCH, true);
        new DriverCombination(Driver::ZEKE, Weapon::BIG_BANG_EDGE, Reaction::LAUNCH, true);
        new DriverCombination(Driver::ZEKE, Weapon::MEGALANCE, Reaction::SMASH, true);
    }
}
