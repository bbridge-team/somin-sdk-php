<?php

namespace SoMin;

class Utils
{
    public static function get(array &$data, $key, $defaultValue = null)
    {
        if (!isset($data[$key])) {
            return $defaultValue;
        }

        return $data[$key];
    }

    public static function getWithUnset(array &$data, $key, $defaultValue = null)
    {
        $value = self::get($data, $key, $defaultValue);
        unset($data[$key]);
        return $value;
    }
}