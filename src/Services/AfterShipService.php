<?php

namespace Tanyudii\AfterShipLaravel\Services;

use AfterShip\AfterShipException;
use AfterShip\Couriers;
use AfterShip\Trackings;

class AfterShipService
{
    protected $apiKey;

    protected $courierSdk;

    protected $trackingSdk;

    /**
     * AfterShipService constructor.
     * @throws AfterShipException
     */
    public function __construct()
    {
        try {
            $this->apiKey = config('aftership-laravel.key');

            $this->courierSdk = new Couriers($this->apiKey);;
            $this->trackingSdk = new Trackings($this->apiKey);;
        } catch (AfterShipException $e) {
            throw $e;
        }
    }

    /**
     * @return array
     */
    public function getCouriers()
    {
        return $this->courierSdk->get();
    }

    /**
     * @return array
     */
    public function getAllCouriers()
    {
        return $this->courierSdk->all();
    }

    /**
     * @param string $trackingNumber
     * @param array $params
     * @return array
     * @throws AfterShipException
     */
    public function createTracking(string $trackingNumber, array $params = [])
    {
        return $this->trackingSdk->create($trackingNumber, $params);
    }

    /**
     * @param string $id
     * @param array $params
     * @return array
     * @throws AfterShipException
     */
    public function trackById(string $id, array $params = [])
    {
        return $this->trackingSdk->getById($id, $params);
    }
}
