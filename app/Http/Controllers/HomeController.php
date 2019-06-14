<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppRepositories\PostRepository as Posts;
use App\AppRepositories\UsersRepository as Users;
use App\AppRepositories\CommentRepository as Comments;


class HomeController extends Controller
{

    private $posts;

    private $users;

    private $comments;

    public function __construct(Posts $posts, Users $users, Comments $comments)
    {
        $this->posts = $posts;
        $this->users = $users;
        $this->comments = $comments;
    }

	/**
     * Display a listing of the resource.
     *
     * @return view with posts
     */

    public function index(){
       $posts = $this->jsonToArray($this->posts->getAll(POSTS_ENDPOINT));

       return view('posts')->withPosts($posts)->withObject($this);

    }

    public function comments($postId){
  
     $comments = $this->jsonToArray($this->comments->getCommentsByPost(POSTS_ENDPOINT, $postId));
     $post = $this->getPost($postId);

     return view('comments')->withComments($comments)->withPost($post);

    }

    public function post($id){ 

     $post = $this->getPost($id);

     return view('post')->withPost($post)->withObject($this);

    }

    public function user($id){ 

     $user = $this->getUser($id);

     return view('user')->withUser($user);

    }

    public function users(){ 

     $users = $this->getUsers();

     return view('users')->withUsers($users);

    }

    private function jsonToArray($json){

       $array = json_decode($json);

       return $array;

    }

    public function getUser($userId){ 
       
       $user = $this->jsonToArray($this->users->get(USERS_ENDPOINT, $userId));

       return $user;

    }

    public function getUsers(){ 
       
       $users = $this->jsonToArray($this->users->getAll(USERS_ENDPOINT));

       return $users;

    }


    public function getPost($id){ 
       
       $post = $this->jsonToArray($this->posts->get(POSTS_ENDPOINT, $id));

       return $post;

    }

}
