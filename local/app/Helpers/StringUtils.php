<?php
namespace App\Helpers;

class StringUtils
{

    public static function isEmpty($str)
    {
        return (! isset($str) || trim($str) === '');
    }

    public static function isNotEmpty($str)
    {
        return ! self::isEmpty($str);
    }

    public static function equal($str1, $str2)
    {
        if (strcmp($str1, $str2) == 0) {
            return true;
        }
        
        return false;
    }

    public static function notEqual($str1, $str2)
    {
        return self::equal($str1, $str2) == false;
    }

    public static function isNumberic($str)
    {
        return ! self::isEmpty(is_numeric($str));
    }
}
