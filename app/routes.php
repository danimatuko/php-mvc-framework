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
 * Register a GET route to display all blog
 *
 * URI: /blog
 * Method: GET
 * Controller method: Blog@index
 */
$router->get('/blog', 'Blog@index');


/**
 * Register a GET route to display a specific post
 *
 * URI: /blog/{id}
 * Method: GET
 * Controller method: Blog@show
 */
$router->get('/blog/{id}', 'Blog@show');


/**
 * Register a GET route to display the form to create a new post
 *
 * URI: /blog/create
 * Method: GET
 * Controller method: Blog@create
 */
$router->get('/blog/create', 'Blog@create');


/**
 * Register a POST route to store a new post
 *
 * URI: /blog
 * Method: POST
 * Controller method: Blog@store
 */
$router->post('/blog', 'Blog@store');


/**
 * Register a GET route to display the form to edit a specific post
 *
 * URI: /blog/edit/{id}
 * Method: GET
 * Controller method: Blog@edit
 */
$router->get('/blog/edit/{id}', 'Blog@edit');


/**
 * Register a PUT route to update a specific post
 *
 * URI: /blog/{id}
 * Method: PUT
 * Controller method: Blog@update
 */
$router->put('/blog/{id}', 'Blog@update');


/**
 * Register a DELETE route to delete a specific post
 *
 * URI: /blog/{id}
 * Method: DELETE
 * Controller method: Blog@destroy
 */
$router->delete('/blog/{id}', 'Blog@destroy');