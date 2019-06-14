<?php

namespace App\AppRepositories;

use App\AppRepositories\Contracts\RepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Helpers\Cache;

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

		//Using the App/Helpers/Cache to set cache for response that aren't cached yet else return cached data

        return Cache::remember('posts.all', REDIS_EXPIRATION, function() use($apiUrl){

        $newUrl = $apiUrl."?_limit=".LIMIT_LIST;
        return $this->client->request('GET', $newUrl)->getBody();

        });

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

		//Using the App/Helpers/Cache to set cache for response that aren't cached yet else return cached data
		//'posts.single'.$id is used to cache just the post with the id not others

		return Cache::remember('posts.single_'.$id, REDIS_EXPIRATION, function() use($apiUrl, $id){

        $newUrl = $apiUrl."/".$id;
        return $this->client->request('GET', $newUrl)->getBody();

        });

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

    	//Using the App/Helpers/Cache to set cache for response that aren't cached yet else return cached data

    	//'posts.userPosts'.$userid is used to cache just the user post with the userId not others

    	return Cache::remember('posts.userPosts_'.$userId, REDIS_EXPIRATION, function() use($apiUrl, $userId){

        $newUrl = $apiUrl."?userId=".$userId."&_limit=".LIMIT_LIST;
        return $this->client->request('GET', $newUrl)->getBody();

        });

    }

}