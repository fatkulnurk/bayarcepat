<?php

namespace Fatkulnurk\Bayarcepat\Payments\Duitku;

use App\Models\PaymentMethod;
use App\Models\Transaction;
use Fatkulnurk\Bayarcepat\Payments\DuitkuInterface;

class Duitku implements DuitkuInterface
{
    private $duitkuConfig;

    public function __construct()
    {
        $this->duitkuConfig = new \Duitku\Config(
            config('setting.payment.accounts.duitku.api_key'),
            config('setting.payment.accounts.duitku.merchant_code')
        );
        // false for production mode | true for sandbox mode
        $this->duitkuConfig->setSandboxMode(config('setting.payment.accounts.duitku.is_sandbox_mode'));
        // set sanitizer (default : true)
        $this->duitkuConfig->setSanitizedMode(config('setting.payment.accounts.duitku.is_sanitize_mode'));
        // set log parameter (default : true)
        $this->duitkuConfig->setDuitkuLogs(config('setting.payment.accounts.duitku.is_log_mode'));
    }

    public function createInvoice(Transaction $transaction, PaymentMethod $paymentMethod)
    {
        $paymentAmount = 10000; // Amount
        $paymentMethod = "BT"; // Permata Bank Virtual Account
        $email = "customer@gmail.com"; // your customer email
        $phoneNumber = ""; // your customer phone number (optional)
        $productDetails = "Pay Invoice " . $transaction->id;
        $merchantOrderId = $transaction->id; // from merchant, unique
        $additionalParam = ''; // optional
        $merchantUserInfo = ''; // optional
        $customerVaName = config('app.name'); // display name on bank confirmation display
        $callbackUrl = route('notifications.duitku.callback.index'); // url for callback
        $returnUrl = route('notifications.duitku.return.index'); // url for redirect
        $expiryPeriod = config('setting.payment.expired_at'); // set the expired time in minutes

        // Customer Detail
        $firstName = config('app.name');
        $lastName = config('app.name');

        // Address
        $alamat = "Jl. Kembangan Raya";
        $city = "Jakarta";
        $postalCode = "11530";
        $countryCode = "ID";

        $address = array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'address' => $alamat,
            'city' => $city,
            'postalCode' => $postalCode,
            'phone' => $phoneNumber,
            'countryCode' => $countryCode
        );

        $customerDetail = array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            'billingAddress' => $address,
            'shippingAddress' => $address
        );

        $item1 = array(
            'name' => $productDetails,
            'price' => $paymentAmount,
            'quantity' => 1
        );

        $itemDetails = array(
            $item1
        );

        $params = array(
            'paymentAmount' => $paymentAmount,
            'paymentMethod' => $paymentMethod,
            'merchantOrderId' => $merchantOrderId,
            'productDetails' => $productDetails,
            'additionalParam' => $additionalParam,
            'merchantUserInfo' => $merchantUserInfo,
            'customerVaName' => $customerVaName,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            'itemDetails' => $itemDetails,
            'customerDetail' => $customerDetail,
            'callbackUrl' => $callbackUrl,
            'returnUrl' => $returnUrl,
            'expiryPeriod' => $expiryPeriod
        );

        try {
            // createInvoice Request
            $responseDuitkuApi = \Duitku\Api::createInvoice($params, $this->duitkuConfig);

            header('Content-Type: application/json');
            echo $responseDuitkuApi;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function checkStatus(Transaction $transaction)
    {
        try {
            $transactionList = \Duitku\Api::transactionStatus($transaction->id, $this->duitkuConfig);

            $transaction = json_decode($transactionList);

            // var_dump($transactionList);

            if ($transaction->statusCode == "00") {
                // Action Success
            } else if ($transaction->statusCode == "01") {
                // Action Pending
            } else {
                // Action Failed Or Expired
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}