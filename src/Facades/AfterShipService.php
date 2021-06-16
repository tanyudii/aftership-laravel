<?php

namespace Tanyudii\AfterShipLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array getCourier()
 * @method static array getAllCourier()
 * @method static array createTracking(string $trackingNumber, array $params = [])
 * @method static array trackById(string $id, array $params = [])
 *
 * @see \Tanyudii\AfterShipLaravel\Services\AfterShipService
 */
class AfterShipService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'aftership-laravel';
    }
}
