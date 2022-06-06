<?php

namespace Fatkulnurk\Bayarcepat\Enums;

class PaymentProviderEnum implements EnumInterface
{
    const DUIKUT = 1;

    public static function transform($key)
    {
        return match ($key) {
            self::DUIKUT => 'Duitku'
        };
    }
}