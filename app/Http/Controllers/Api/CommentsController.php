<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\AppRepositories\CommentRepository;

class CommentsController extends Controller
{

    private $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repo = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return all comments
     */
    public function index()
    {
        return $this->repo->getAll(COMMENTS_ENDPOINT);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return comments base on post id
     */
    public function getCommentByPost($postid)
    {
        return $this->repo->getCommentsByPost(COMMENTS_ENDPOINT, $postid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return display a single post
     */
    public function show($id)
    {
        return $this->repo->get(COMMENTS_ENDPOINT, $id);
    }

}