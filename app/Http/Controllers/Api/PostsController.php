<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\AppRepositories\PostRepository;

class PostsController extends Controller
{

    private $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repo = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return lists of posts
     */
    public function index()
    {
        echo "<pre>"; // Returns data in preformatted text
        return $this->repo->getAll(POSTS_ENDPOINT);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return a single post based on its id
     */
    public function show($id)
    {
        echo "<pre>"; // Returns data in preformatted text
        return $this->repo->get(POSTS_ENDPOINT, $id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return list of posts based on user's id
     */
    public function userPosts($userid)
    {
        echo "<pre>"; // Returns data in preformatted text
        return $this->repo->getPostsByUser(POSTS_ENDPOINT, $userid);
    }

}
