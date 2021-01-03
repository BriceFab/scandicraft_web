<?php

namespace App\Classes;

use ReflectionClass;

/**
 * Class EnumParamKey
 * @package App\Classes
 */
class EnumParamKey
{

    const SITE_NAME = 'param.site.name';
    const SITE_LOGO = 'param.site.logo';
    const UNKNOWN_BACKGROUND = 'param.unknown.background';

    public static function getList() {
        $class = new ReflectionClass(self::class);
        return $class->getConstants();
    }

}
