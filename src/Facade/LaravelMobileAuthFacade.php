<?php

namespace UserAuth\laravelMobileAuth\Facade;
use Illuminate\Support\Facades\Facade;
use UserAuth\laravelMobileAuth\LaravelMobileAuth;


/**
 * @method static string doSomething()
 *
 * @see LaravelMobileAuth
 * @package UserAuth\laravelMobileAuth\Facade
 */
class LaravelMobileAuthFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "LaravelMobileAuth";
    }
}
