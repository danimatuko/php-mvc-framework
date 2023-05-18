<?php class Post {
    private $db;

    public function __construct() {

        $this->db = new Database();
        $this->db->getConn();
    }

    public function getAllPosts() {
        $sql = "SELECT * 
                FROM article
                ORDER BY published_at";

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function getPostById($id) {
        $sql = "SELECT * 
                FROM article
                WHERE id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function createPost($title, $content) {
        $sql = "INSERT INTO article (title, content)
                VALUES (:title, :content)";

        $this->db->query($sql);
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);

        return $this->db->execute();
    }

    public function updatePost($id, $title, $content) {
        $this->db->query('UPDATE posts SET title = :title, content = :content WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        return $this->db->execute();
    }

    public function deletePost($id) {
        $sql = "DELETE FROM article 
                WHERE id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}