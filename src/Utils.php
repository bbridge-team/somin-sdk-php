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
}