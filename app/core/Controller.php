<?php

require 'View.php';

class Controller {
    protected $view;


    public function index() {
        // Default action
    }

    public function render($view, $data = array()) {
        $this->view = new View();
        $this->view->render($view, $data);
    }

    public function redirect($url) {
        header("Location: $url");
        exit();
    }
}