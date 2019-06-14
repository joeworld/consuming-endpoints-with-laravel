<?php

namespace App\AppRepositories;

use App\AppRepositories\Contracts\RepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Helpers\Cache;

/*
|-----------------------------------------------------------------------------------
| This class will get comments from the Endpoints
| While its implementing the RepositoryInterface
|-----------------------------------------------------------------------------------
|
*/

class CommentRepository implements RepositoryInterface {

	private $client;

	public function __construct(){
        
        //Guzzle client instance
        
        $this->client = new Client();

	}

	/**
	 * Get all comments
	 *
	 * @param string
	 * @return collection
	 */

	public function getAll($apiUrl)
	{

		//Using the App/Helpers/Cache to set cache for response that aren't cached yet else return cached data

        return Cache::remember('comments.all', REDIS_EXPIRATION, function() use($apiUrl){

        $newUrl = $apiUrl."?_limit=".LIMIT_LIST;
        return $this->client->request('GET', $newUrl)->getBody();

        });

	}

	/**
	 * Get a comment by its id
	 *
	 * @param string
	 * @param int
	 * @return collection
	 */

	public function get($apiUrl, $id)
	{
		
		//Using the App/Helpers/Cache to set cache for response that aren't cached yet else return cached data

		return Cache::remember('comments.single_'.$id, REDIS_EXPIRATION, function() use($apiUrl, $id){

        $newUrl = $apiUrl."/".$id;
        return $this->client->request('GET', $newUrl)->getBody();

        });

	}

	/**
	 * Get comments by post id
	 *
	 * @param string
	 * @param int
	 * @return collection
	 */

	public function getCommentsByPost($apiUrl, $postId)
	{

		//Using the App/Helpers/Cache to set cache for response that aren't cached yet else return cached data

		return Cache::remember('comments.commentsByPost_'.$postId, REDIS_EXPIRATION, function() use($apiUrl, $postId){

		$client = new Client();
		$newUrl = $apiUrl."/".$postId."/comments?_limit=".LIMIT_LIST;
		return $this->client->request('GET', $newUrl)->getBody();
	    });

	}

	}