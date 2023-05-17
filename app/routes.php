<?php

/**
 * Matches the root URL to the Home controller's index method.
 *
 * @return array|null Returns the matching route or null if no match is found.
 */
$router->get('/', 'Home@index');

/**
 * Matches the "/about" URL to the About controller's index method.
 *
 * @return array|null Returns the matching route or null if no match is found.
 */
$router->get('/about', 'About@index');

/**
 * Matches the "/contact" URL to the Contact controller's index method.
 *
 * @return array|null Returns the matching route or null if no match is found.
 */
$router->get('/contact', 'Contact@index');


/**
 * Register a GET route to display all posts
 *
 * URI: /blog
 * Method: GET
 * Controller method: Posts@index
 */
$router->get('/blog', 'Posts@index');


/**
 * Register a GET route to display a specific post
 *
 * URI: /posts/{id}
 * Method: GET
 * Controller method: Posts@show
 */
$router->get('/posts/{id}', 'Posts@show');


/**
 * Register a GET route to display the form to create a new post
 *
 * URI: /posts/create
 * Method: GET
 * Controller method: Posts@create
 */
$router->get('/posts/create', 'Posts@create');


/**
 * Register a POST route to store a new post
 *
 * URI: /posts
 * Method: POST
 * Controller method: Posts@store
 */
$router->post('/posts', 'Posts@store');


/**
 * Register a GET route to display the form to edit a specific post
 *
 * URI: /posts/edit/{id}
 * Method: GET
 * Controller method: Posts@edit
 */
$router->get('/posts/edit/{id}', 'Posts@edit');


/**
 * Register a PUT route to update a specific post
 *
 * URI: /posts/{id}
 * Method: PUT
 * Controller method: Posts@update
 */
$router->put('/posts/{id}', 'Posts@update');


/**
 * Register a DELETE route to delete a specific post
 *
 * URI: /posts/{id}
 * Method: DELETE
 * Controller method: Posts@destroy
 */
$router->delete('/posts/{id}', 'Posts@destroy');