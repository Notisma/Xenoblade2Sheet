<?php

namespace XC2S\Model\DataObject;

use XC2S\Configuration\DatabaseConnection;

abstract class AbstractDataObject
{
    public abstract function toArray(): array;
}
