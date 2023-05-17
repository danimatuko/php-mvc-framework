<?php

require 'View.php';

/**
 * The Controller class handles the logic and functionality of the application's controllers.
 */
class Controller {
    /**
     * @var View The view object used for rendering views.
     */
    protected $view;

    /**
     * Default action method.
     */
    public function index() {
        // Default action
    }

    /**
     * Renders a view with the given data.
     *
     * @param string $view The name of the view to render.
     * @param array $data An associative array of data to be passed to the view.
     */
    public function render($view, $data = []) {
        $this->view = new View();
        $this->view->render($view, $data);
    }

    /**
     * Redirects the user to the specified URL.
     *
     * @param string $url The URL to redirect to.
     */
    public function redirect($url) {
        header("Location: $url");
        exit();
    }
}