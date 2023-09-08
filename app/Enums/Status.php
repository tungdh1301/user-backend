<?php

namespace App\Enums;

use ReflectionClass;

class Status
{
    public const ACTIVE = 1;

    public const INACTIVE = 0;

    protected static array $labels = [
        self::ACTIVE => 'active',
        self::INACTIVE => 'inactive',
    ];

    protected static array $classCss = [
        self::ACTIVE => '',
        self::INACTIVE => 'text-danger',
    ];

    public static function getConstants(): array
    {
        $oClass = new ReflectionClass(__CLASS__);

        return $oClass->getConstants();
    }

    public static function label(int $type): string
    {
        return static::$labels[$type] ?? '';
    }

    public static function labels(): array
    {
        return static::$labels;
    }

    public static function classCss(int $type): string
    {
        return static::$classCss[$type] ?? '';
    }
}
