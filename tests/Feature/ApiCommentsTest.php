<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Client;

class ApiCommentsTest extends TestCase
{

    /**
     * Test Comments Page and see if its json response
     *
     * @return void
     */

	public function testCommentsPage()
    {
        $this->json('GET', 'api/comments', [])->assertSuccessful();
    }

    /**
     * Test Comment Single Page and see if its json response
     *
     * @return void
     */

    public function testCommentPage()
    {
        $this->json('GET', 'api/comments/1', [])->assertSuccessful();

    }

    /**
     * Test Post Comment Page and see if its json response
     *
     * @return void
     */

    public function testCheckPostComment()
    {
        $this->json('GET', 'api/posts/1/comments', [])->assertSuccessful();
    }

    /**
     * Check the comments endpoint
     *
     * @return void
     */

    public function testCommentsCheckEndPoint()
    {
        $client = new Client();
        $apiUrl = COMMENTS_ENDPOINT.'?_limit='.LIMIT_LIST;
        $data = $client->request('GET', $apiUrl)->getBody();
        $response = $this->get('api/comments');
        $response->assertJson(json_decode($data, TRUE));
    }

    /**
     * Check the Comment Single endpoint
     *
     * @return void
     */

    public function testCommentCheckEndPoint()
    {
        $client = new Client();
        $data = $client->request('GET', COMMENTS_ENDPOINT."/1")->getBody();
        $response = $this->get('api/comments/1');
        $response->assertJson(json_decode($data, TRUE));
    }

    /**
     * Check the Post Comment endpoint
     *
     * @return void
     */

    public function testPostCommentsEndPoint()
    {  
        $client = new Client();
        $data = $client->request('GET', POSTS_ENDPOINT."/1/comments?_limit=".LIMIT_LIST)->getBody();
        $response = $this->get('api/posts/1/comments');
        $response->assertJson(json_decode($data, TRUE));
    }

}