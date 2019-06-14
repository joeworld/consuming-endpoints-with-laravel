<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\AppRepositories\UsersRepository;

class UsersController extends Controller
{

    private $repository;

    public function __construct(UsersRepository $repository)
    {
        $this->repo = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return a list of users
     */
    public function index()
    {
       echo "<pre>"; // Returns data in preformatted text
       return $this->repo->getAll(USERS_ENDPOINT);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return a user based on user id
     */
    public function show($id)
    {
        echo "<pre>"; // Returns data in preformatted text
        return $this->repo->get(USERS_ENDPOINT, $id);
    }

}