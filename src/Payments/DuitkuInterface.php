<?php

namespace Fatkulnurk\Bayarcepat\Payments;

use App\Models\PaymentMethod;
use App\Models\Transaction;

interface DuitkuInterface
{
    public function createInvoice(Transaction $transaction, PaymentMethod $paymentMethod);
    public function checkStatus(Transaction $transaction);
}