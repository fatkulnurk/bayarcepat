<?php

namespace Fatkulnurk\Bayarcepat\Enums;

class PaymentStatusEnum implements EnumInterface
{
    const PENDING = 1;
    const SUCCESS = 2;
    const CANCEL = 3;
    const EXPIRED = 4;
    const REFUND = 4;

    public static function transform($key)
    {
        return match ($key) {
            self::PENDING => 'Pending',
            self::SUCCESS => 'Success',
            self::CANCEL => 'Cancel',
            self::EXPIRED => 'Expired',
            self::REFUND => 'Refund'
        };
    }
}