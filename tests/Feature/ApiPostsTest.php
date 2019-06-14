<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Client;

class ApiPostsTest extends TestCase
{

    /**
     * Test Posts Page and see if its json response
     *
     * @return void
     */

    public function testPostsPage()
    {
        $this->json('GET', 'api/posts', [])->assertSuccessful();

    }

    /**
     * Test Posts Single Page and see if its json response
     *
     * @return void
     */

    public function testPostPage()
    {
        $this->json('GET', 'api/posts/1', [])->assertSuccessful();
    }

    /**
     * Test User Posts Page and see if its json response
     *
     * @return void
     */

    public function testCheckUserPosts()
    {
        $this->json('GET', 'api/users/1/posts', [])->assertSuccessful();
    }

    /**
     * Check the Posts endpoint
     *
     * @return void
     */

    public function testPostsCheckEndPoint()
    {
        $client = new Client();
        $apiUrl = POSTS_ENDPOINT.'?_limit='.LIMIT_LIST;
        $data = $client->request('GET', $apiUrl)->getBody();
        $response = $this->get('api/posts');
        $response->assertJson(json_decode($data, TRUE));
    }

    /**
     * Check the Post Single endpoint
     *
     * @return void
     */

    public function testPostCheckEndPoint()
    {
        $client = new Client();
        $data = $client->request('GET', POSTS_ENDPOINT."/1")->getBody();
        $response = $this->get('api/posts/1');
        $response->assertJson(json_decode($data, TRUE));
    }

    /**
     * Check User Post endpoint
     *
     * @return void
     */

    public function testCheckUserPostsEndPoint()
    {
        $client = new Client();
        $apiUrl = POSTS_ENDPOINT."?userId=1&_limit=".LIMIT_LIST;
        $data = $client->request('GET', $apiUrl)->getBody();
        $response = $this->get('api/users/1/posts');
        $response->assertJson(json_decode($data, TRUE));
    }

}