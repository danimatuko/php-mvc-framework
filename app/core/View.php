<?php

/**
 * The View class handles the rendering of views in the application.
 */
class View {
    /**
     * @var string The directory path where the view files are located.
     */
    protected $viewsDir;

    /**
     * View constructor.
     */
    public function __construct() {
        $this->viewsDir = VIEWS_DIR;
    }

    /**
     * Renders a view with the given data.
     *
     * @param string $view The name of the view file to render.
     * @param array $data An associative array of data to be passed to the view.
     * @return mixed The result of the included view file.
     * @throws Exception If the view file is not found.
     */
    public function render($view, $data = []) {
        $viewFile = $this->viewsDir . '/' . $view . '.php';

        if (file_exists($viewFile)) {
            extract($data);
            return require $viewFile;
        }

        throw new Exception('View file not found: ' . $view);
    }
}