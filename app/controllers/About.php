<?php

/**
 * About Controller
 *
 * This controller handles the About page functionality.
 */

require CORE_DIR . '/Controller.php';

class About extends Controller {
    /**
     * Constructor method.
     */
    public function __construct() {
    }

    /**
     * Index method.
     *
     * Displays the About page.
     */
    public function index() {
        $data = [
            'title' => 'About'
        ];

        $this->render('/about/index', $data);
    }
}