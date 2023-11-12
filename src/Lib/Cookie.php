<?php

namespace XC2S\Lib;

class Cookie
{
    public static function register(string $key, mixed $value, ?int $expirationTime = 0): void
    {
        $valueSerialized = serialize($value);
        setcookie($key, $valueSerialized, $expirationTime);
    }

    public static function read(string $key): mixed
    {
        if (isset($_COOKIE[$key])) {
            $strCook = $_COOKIE[$key];
            return unserialize($strCook);
        } else {
            return false;
        }
    }

    public static function contains($key): bool
    {
        return isset($_COOKIE[$key]);
    }

    public static function delete($key): void
    {
        unset($_COOKIE[$key]);
        setcookie($key, "", 1);
    }
}
