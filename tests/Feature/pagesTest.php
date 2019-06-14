<?php

namespace Tests\Feature;

use Tests\TestCase;

class pagesTest extends TestCase
{

    public function testPostsTest()
    {
        $response = $this->get('posts');

        $response->assertStatus(200);
    }

    public function testPostSingleTest()
    {
        $response = $this->get('posts/1');

        $response->assertStatus(200);
    }


    public function testUsersTest()
    {
        $response = $this->get('users');

        $response->assertStatus(200);
    }

    public function testUserSingleTest()
    {
        $response = $this->get('users/1');

        $response->assertStatus(200);
    }

    public function testPostWithCommentTest()
    {
        $response = $this->get('posts/1/comments');

        $response->assertStatus(200);
    }

    public function testUserPostTest()
    {
        $response = $this->get('users/1/posts');

        $response->assertStatus(200);
    }

}