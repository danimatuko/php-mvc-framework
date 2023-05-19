<?php

require CORE_DIR . '/Database.php';
require CORE_DIR . '/Controller.php';
require MODELS_DIR . '/Post.php';

/**
 * Class Blog
 */
class Blog extends Controller {
    /**
     * @var Database The database instance.
     */
    private $db;

    /**
     * @var Post The post instance.
     */
    private $post;

    /**
     * Blog constructor.
     */
    public function __construct() {
        $this->db = new Database();
        $this->db->getConn();
        $this->post = new Post();
    }

    /**
     * Show the index page of the blog.
     */
    public function index() {
        $posts = $this->post->getAllPosts();

        $data = [
            'title' => 'Blog',
            'file' => 'index',
            'posts' => $posts
        ];

        $this->render('blog/index', $data);
    }

    /**
     * Show a specific blog post by its ID.
     *
     * @param int $id The ID of the blog post.
     */
    public function show($id) {
        $post = $this->post->getPostById($id);

        $data = [
            'title' => $post['title'],
            'file' => 'index',
            'post' => $post
        ];

        $this->render('blog/show', $data);
    }

    /**
     * Show the create post form.
     */
    public function create() {
        $this->render('blog/create');
    }

    /**
     * Store a new post in the database.
     */
    public function store() {
        echo 'handle processing the form data and creating a new post here';
        $this->post->createPost($_POST['title'], $_POST['content']);
        $this->redirect('/blog');
    }

    /**
     * Show the edit form for a specific post.
     *
     * @param int $id The ID of the post to edit.
     */
    public function edit($id) {
        $this->post = $this->post->getPostById($id);

        $data = [
            'title' => 'Edit Post',
            'post' => $this->post
        ];

        $this->render('blog/edit', $data);
    }

    /**
     * Update an existing post in the database.
     *
     * @param int $id The ID of the post to update.
     */
    public function update($id) {
        $this->post->updatePost($id, $_POST['title'], $_POST['content']);
        $this->redirect('/blog');
    }

    /**
     * Delete a post from the database.
     *
     * @param int $id The ID of the post to delete.
     */
    public function destroy($id) {
        $this->post->deletePost($id);
        $this->redirect('/blog');
    }
}