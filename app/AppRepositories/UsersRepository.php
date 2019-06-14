<?php

namespace App\AppRepositories;

use App\AppRepositories\Contracts\RepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Helpers\Cache;

/*
|-----------------------------------------------------------------------------------
| This class will get users from the Endpoints
| While its implementing the RepositoryInterface
|-----------------------------------------------------------------------------------
|
*/

class UsersRepository implements RepositoryInterface {

	protected $client;

    public function __construct(){

        //Guzzle client instance

        $this->client = new Client();

    }

    /**
	 * Get all users
	 *
	 * @param string
	 * @return collection
	 */

	public function getAll($apiUrl)
	{

		//Using the App/Helpers/Cache to set cache for response that aren't cached yet else return cached data

        return Cache::remember('users.all', REDIS_EXPIRATION, function() use($apiUrl){

        $newUrl = $apiUrl."?_limit=".LIMIT_LIST;
        return $this->client->request('GET', $newUrl)->getBody();

        });


	}


	/**
	 * Get a user by user id
	 *
	 * @param string
	 * @param int
	 * @return collection
	 */

	public function get($apiUrl, $id)
	{

		//Using the App/Helpers/Cache to set cache for response that aren't cached yet else return cached data

		//'users.single'.$id is used to cache just the user with the id not others

		return Cache::remember('users.single_'.$id, REDIS_EXPIRATION, function() use($apiUrl, $id){

        $newUrl = $apiUrl."/".$id;
        return $this->client->request('GET', $newUrl)->getBody();

        });

	}

}