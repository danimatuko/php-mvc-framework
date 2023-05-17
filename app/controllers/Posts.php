<?php

require CORE_DIR . '/Database.php';
require CORE_DIR . '/Controller.php';

class Posts extends Controller {
    private $db;
    private $conn;
    private $data = [];

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->getConn();
    }


    public function index() {

        $sql = "SELECT * 
                FROM article
                ORDER BY published_at";

        $results = $this->conn->query($sql);

        $this->data = $results->fetchAll(PDO::FETCH_ASSOC);



        $data = [
            'title' => __CLASS__,
            'file' => 'index',
            'posts' => $this->data
        ];

        $this->render('posts/index', $data);
    }

    public function show($id) {
        echo 'handle displaying the details of a specific post here.' . $id;
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
        echo 'handle deleting the specified post here';
    }
}