<?php

namespace XC2S\Model\DataObject;

class Blade extends AbstractDataObject
{
    public string $name;
    public string $element;
    public string $weaponClass;

    public function __construct(string $name, string $element, string $weaponClass)
    {
        $this->name = $name;
        $this->element = $element;
        $this->weaponClass = $weaponClass;
    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'element' => $this->element,
            'weaponClass' => $this->weaponClass,
        ];
    }
}
