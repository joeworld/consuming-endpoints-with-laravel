<?php

namespace App\AppRepositories;

use App\AppRepositories\Contracts\RepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

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

        $newUrl = $apiUrl."?_limit=".LIMIT_LIST;
        return $this->client->request('GET', $newUrl)->getBody();
        
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

        $newUrl = $apiUrl."/".$id;
        return $this->client->request('GET', $newUrl)->getBody();

	}

}