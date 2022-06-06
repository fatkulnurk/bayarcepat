<?php

namespace Fatkulnurk\Bayarcepat\Apis;

use Fatkulnurk\Bayarcepat\ConfigJar;
use Illuminate\Support\Facades\Http;

class BayarCepatApi
{
    public function login($email, $password)
    {
        $url = ConfigJar::getInstance()->getBaseUrl() . '/login';
        $data = ['email' => $email, 'password' => $password];
        $response = Http::timeout(5)
            ->withoutVerifying()
            ->acceptJson()
            ->post($url, $data);

        if ($response->ok()) {
            return (array)$response->json();
        }

        throw new \Exception('Login Failed');
    }

    public function getProducts(
        $brandId = null,
        $brandTypeId = null,
        $groupId = null,
        $categoryId = null,
        $isAutomaticDelivery = null,
        $expand = null
    )
    {
        $httpQuery = http_build_query([
            'brand_id' => $brandId,
            'brand_type_id' => $brandTypeId,
            'group_id' => $groupId,
            'category_id' => $categoryId,
            'is_automatic_delivery' => $isAutomaticDelivery,
            'expand' => $expand
        ]);
        $url = ConfigJar::getInstance()->getBaseUrl() . '/v1/products?' . $httpQuery;

        return \Illuminate\Support\Facades\Http::asJson()
            ->withoutVerifying()
            ->withToken(ConfigJar::getInstance()->getToken())
            ->get($url)
            ->json();
    }

    public function getBrands($expand = false)
    {
        $httpQuery = http_build_query(['expand' => $expand]);
        $url = ConfigJar::getInstance()->getBaseUrl() . '/v1/brands?' . $httpQuery;

        return \Illuminate\Support\Facades\Http::asJson()
            ->withToken(ConfigJar::getInstance()->getToken())->withoutVerifying()
            ->get($url)
            ->json();
    }

    public function getCategories()
    {
        $url = ConfigJar::getInstance()->getBaseUrl() . '/v1/categories';

        return \Illuminate\Support\Facades\Http::asJson()
            ->withToken(ConfigJar::getInstance()->getToken())->withoutVerifying()
            ->get($url)
            ->json();
    }

    public function getGroups()
    {
        $url = ConfigJar::getInstance()->getBaseUrl() . '/v1/groups';

        return \Illuminate\Support\Facades\Http::asJson()
            ->withToken(ConfigJar::getInstance()->getToken())->withoutVerifying()
            ->get($url)
            ->json();
    }

    public function getTransactions(
        $brandId = null,
        $categoryId = null,
        $groupId = null,
        $merchantId = null,
        $status = null,
        $fromdate = null,
        $toDate = null
    )
    {
        $httpQuery = http_build_query([
            'brand_id' => $brandId,
            'group_id' => $groupId,
            'category_id' => $categoryId,
            'merchant_id' => $merchantId,
            'status' => $status,
            'from_date' => $fromdate,
            'to_date' => $toDate
        ]);
        $url = ConfigJar::getInstance()->getBaseUrl() . '/v1/transactions?' . $httpQuery;

        return \Illuminate\Support\Facades\Http::asJson()
            ->withToken(ConfigJar::getInstance()->getToken())->withoutVerifying()
            ->get($url)
            ->json();
    }

    public function getMerchants()
    {
        $url = ConfigJar::getInstance()->getBaseUrl() . '/v1/merchants';

        return \Illuminate\Support\Facades\Http::asJson()
            ->withToken(ConfigJar::getInstance()->getToken())->withoutVerifying()
            ->get($url)
            ->json();
    }

    public function orders()
    {
        $url = ConfigJar::getInstance()->getBaseUrl() . '/v1/orders';

        return \Illuminate\Support\Facades\Http::asJson()
            ->withToken(ConfigJar::getInstance()->getToken())->withoutVerifying()
            ->post($url)
            ->json();
    }

    public function inquiry()
    {

    }

    public function payBill()
    {

    }
}