<?php

namespace App\AppRepositories;

use App\AppRepositories\Contracts\RepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/*
|-----------------------------------------------------------------------------------
| This class will get posts from the Endpoints
| While its implementing the RepositoryInterface
|-----------------------------------------------------------------------------------
|
*/

class PostRepository implements RepositoryInterface {

	private $client;

	public function __construct()
	{

        //Guzzle client instance

        $this->client = new Client();
	}

	/**
	 * Get all posts
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
	 * Get a post by its id
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

	/**
	 * Get posts by userId
	 *
	 * @param string
	 * @param int
	 * @return collection
	 */

    public function getPostsByUser($apiUrl, $userId)
    {

        $newUrl = $apiUrl."?userId=".$userId."&_limit=".LIMIT_LIST;
        return $this->client->request('GET', $newUrl)->getBody();

    }

}