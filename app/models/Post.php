<?php

/**
 * Class Post
 */
class Post {
    /**
     * @var Database The database instance.
     */
    private $db;

    /**
     * Post constructor.
     */
    public function __construct() {
        $this->db = new Database();
        $this->db->getConn();
    }

    /**
     * Get all posts from the database.
     *
     * @return array The array of posts.
     */
    public function getAllPosts() {
        $sql = "SELECT * 
                FROM article
                ORDER BY published_at DESC ";

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    /**
     * Get a post by its ID from the database.
     *
     * @param int $id The ID of the post.
     * @return array|false The post data if found, false otherwise.
     */
    public function getPostById($id) {
        $sql = "SELECT * 
                FROM article
                WHERE id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    /**
     * Create a new post and store it in the database.
     *
     * @param string $title The title of the post.
     * @param string $content The content of the post.
     * @return bool Whether the post creation was successful or not.
     */
    public function createPost($title, $content) {
        $sql = "INSERT INTO article (title, content)
                VALUES (:title, :content)";

        $this->db->query($sql);
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);

        return $this->db->execute();
    }

    /**
     * Update an existing post in the database.
     *
     * @param int $id The ID of the post to update.
     * @param string $title The new title of the post.
     * @param string $content The new content of the post.
     * @return bool Whether the post update was successful or not.
     */
    public function updatePost($id, $title, $content) {
        $sql = "UPDATE article 
                SET title = :title, content = :content, published_at = :published_at 
                WHERE id = :id";


        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        $this->db->bind(':published_at', date("Y-m-d H:i:s"));
        return $this->db->execute();
    }

    /**
     * Delete a post from the database.
     *
     * @param int $id The ID of the post to delete.
     * @return bool Whether the post deletion was successful or not.
     */
    public function deletePost($id) {
        $sql = "DELETE FROM article 
                WHERE id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}