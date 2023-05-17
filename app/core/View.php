<?php


class View {
    protected $viewDir;

    public function __construct() {
        $this->viewDir = VIEWS_DIR;
    }

    public function render($view, $data = []) {
        $viewFile = $this->viewDir . '/' . $view . '.php';

        if (file_exists($viewFile)) {
            extract($data);
            return require $viewFile;
        }

        throw new Exception('View file not found: ' . $view);
    }
}