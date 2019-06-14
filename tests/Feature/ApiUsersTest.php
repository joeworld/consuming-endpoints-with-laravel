<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Client;

class ApiUsersTest extends TestCase
{

    /**
     * Test Users Page and see if its json response
     *
     * @return void
     */

    public function testUsersPage()
    {
      $this->json('GET', 'api/users', [])->assertSuccessful();
    }

    /**
     * Test User Single Page and see if its json response
     *
     * @return void
     */

    public function testUserPage()
    {
      $this->json('GET', 'api/users/1', [])->assertSuccessful();
    }

    /**
     * Check the Users endpoint
     *
     * @return void
     */

    public function testUsersCheckEndPoint()
    {
        $client = new Client();
        $apiUrl = USERS_ENDPOINT.'?_limit='.LIMIT_LIST;
        $data = $client->request('GET', $apiUrl)->getBody();
        $response = $this->get('api/users');
        $response->assertJson(json_decode($data, TRUE));
    }

    /**
     * Check the User Single endpoint
     *
     * @return void
     */

    public function testUserCheckEndPoint()
    {
        $client = new Client();
        $data = $client->request('GET', USERS_ENDPOINT."/1")->getBody();
        $response = $this->get('api/users/1');
        $response->assertJson(json_decode($data, TRUE));
    }

}