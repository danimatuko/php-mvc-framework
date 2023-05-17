<?php

require CORE_DIR . '/Controller.php';

class Home extends Controller {
    public function __construct() {
        $data = ['title' => 'Home'];
        $this->render('Home', $data);
    }

    public function index() {
    }
}