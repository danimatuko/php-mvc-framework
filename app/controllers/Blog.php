<?php

require CORE_DIR . '/Database.php';
require CORE_DIR . '/Controller.php';
require MODELS_DIR . '/Post.php';

class Blog extends Controller {
    private $db;
    private $post;

    public function __construct() {
        $this->db = new Database();
        $this->db->getConn();
        $this->post = new Post();
    }


    public function index() {

        $posts = $this->post->getAllPosts();

        $data = [
            'title' => 'Blog',
            'file' => 'index',
            'posts' => $posts
        ];

        $this->render('blog/index', $data);
    }

    public function show($id) {

        $post = $this->post->getPostById($id);

        $data = [
            'title' => $post['title'],
            'file' => 'index',
            'post' => $post
        ];

        $this->render('blog/show', $data);
    }


    public function create() {
        echo 'handle displaying a form for creating a new post here';
    }

    public function store() {
        echo 'handle processing the form data and creating a new post here';
    }

    public function edit($id) {
        echo 'handle displaying a form for editing an existing post here';
    }

    public function update($id) {
        echo 'handle processing the form data and updating the specified post here';
    }

    public function destroy($id) {
        $this->post->deletePost($id);
        $this->redirect('/blog');
    }
}