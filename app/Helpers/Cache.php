<?php

namespace App\Helpers;

use Redis;

class Cache {

    public static function remember($key, $expiration, $callback)
    {
    	if(Redis::get($key)) //If key is available then just return its value
    		return Redis::get($key);
    	else //Create a new key, and return the call back entity
    		Redis::setex($key, $expiration, $callBackEntities = $callback());
    	    return $callBackEntities;
    }

}