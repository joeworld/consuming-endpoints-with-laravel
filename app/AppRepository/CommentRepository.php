<?php

namespace App\AppRepositories;

use App\AppRepositories\Contracts\RepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

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

        $newUrl = $apiUrl."?_limit=".LIMIT_LIST;
        return $this->client->request('GET', $newUrl)->getBody();

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
		
        $newUrl = $apiUrl."/".$id;
        return $this->client->request('GET', $newUrl)->getBody();

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

		$client = new Client();
		$newUrl = $apiUrl."/".$postId."/comments?_limit=".LIMIT_LIST;
		return $this->client->request('GET', $newUrl)->getBody();

	}

	}