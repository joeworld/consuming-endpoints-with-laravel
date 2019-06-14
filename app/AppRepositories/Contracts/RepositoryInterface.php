<?php

namespace App\AppRepositories\Contracts;

/*
|--------------------------------------------------------------------------
| To make it easier to swap implementations at a later time, I'm using the Repository Pattern for this application
|--------------------------------------------------------------------------
|
*/

/*
|--------------------------------------------------------------------------
| Build Our Interface
|--------------------------------------------------------------------------
|
*/

interface RepositoryInterface {

	public function getAll($apiUrl);

	public function get($apiUrl, $id);

}