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


        $data = [
            // 'title' => $post['title'],
            // 'file' => 'index',
            // 'post' => $post
        ];
        $this->render('blog/create', $data);
    }

    public function store() {
        echo 'handle processing the form data and creating a new post here';
        $this->post->createPost($_POST['title'], $_POST['content']);
        $this->redirect('/blog');
    }


    public function edit($id) {
        $data = [
            // 'title' => $post['title'],
            // 'file' => 'index',
            // 'post' => $post
        ];
        $this->render('blog/edit', $data);
    }

    public function update($id) {
        echo 'handle processing the form data and updating the specified post here';
    }

    public function destroy($id) {
        $this->post->deletePost($id);
        $this->redirect('/blog');
    }
}