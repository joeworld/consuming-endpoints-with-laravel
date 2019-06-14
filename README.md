# consuming-endpoints-with-laravel
Consuming Third Party (https://jsonplaceholder.typicode.com) API with Laravel 5.8.21

Clone:- git clone https://github.com/joeworld/consuming-endpoints-with-laravel.git

Update dependencies:- composer update.

Add a .env file and generate application key.

Change redis configuration if you have to in config/database.php.


Libraries used:- Guzzle as my HTTP client/Network request library. Its extensible, Reddis as my Caching library to reduce page loads/latency.

Patterns:- Repository Pattern.

Tests:- PHPUnit. Check tests/Feature directory to see all tests.

app/Helpers:- To see all custom helpers.


***The Homepage shows all posts with their users like a blog format*** and you can further navigate to other users and their posts***
