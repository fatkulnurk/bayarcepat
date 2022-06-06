<?php

namespace Fatkulnurk\Bayarcepat;

use Fatkulnurk\Bayarcepat\Apis\BayarCepatApi;

class ConfigJar
{
    private static $instance = null;
    private $data = [];

    private function __construct()
    {
        $this->set('base_url', 'http://bayarcepat.test/api');
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ConfigJar();
        }

        return self::$instance;
    }

    public function initialize(
        $email,
        $password,
        $merchantId
    )
    {
        $this->set('merchant_id', $merchantId);
        $token = cache()->remember('bayarcepat-token', 3600 * 24, function () use ($email, $password) {
            return (new BayarCepatApi())->login($email,$password)['token'];
        });

        $this->set('token', $token);
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function get($key, $defaultValue = null)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        return $defaultValue;
    }

    public function getToken()
    {
        return $this->get('token');
    }

    public function getBaseUrl()
    {
        return $this->get('base_url');
    }

    public function getMerchant()
    {
        return $this->get('merchant_id');
    }
}