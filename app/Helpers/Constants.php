<?php

/**
 *
 * Constants definations to be used in application
 *
 */

# Pagination/List limit
if(!defined('LIMIT_LIST'))
	define('LIMIT_LIST', 10);

# Constant for USERS_ENDPOINT

if(!defined('USERS_ENDPOINT'))
	define('USERS_ENDPOINT', "https://jsonplaceholder.typicode.com/users");


# Constant for POSTS_ENDPOINT
if(!defined('POSTS_ENDPOINT'))
	define('POSTS_ENDPOINT', "https://jsonplaceholder.typicode.com/posts");

# Constant for COMMENTS_ENDPOINT
if(!defined('COMMENTS_ENDPOINT'))
	define('COMMENTS_ENDPOINT', "https://jsonplaceholder.typicode.com/comments");

# Constant for storing data into redis for the next 24hrs
if(!defined('REDIS_EXPIRATION'))
	define('REDIS_EXPIRATION', 60*60*24);