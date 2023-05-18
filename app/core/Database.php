<?php

/**
 * Connection to the database
 */
class Database {
    private $host;
    private $db;
    private $username;
    private $password;
    private $stmt;
    private $conn;


    /**
     * Contructor
     *
     * @param string $host Host name 
     * @param string $db Database name
     * @param string $username User name
     * @param string $password Password
     */
    public function __construct() {
        $this->host = HOST;
        $this->db = DB;
        $this->username = USER;
        $this->password = PASSWORD;
    }


    /**
     * Get the database connection
     *
     * @return object PDO connection to the database
     */
    public function getConn() {


        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=utf8";

        try {
            $db = new PDO($dsn, $this->username, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $db;

            return $db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }



    public function query($sql) {
        $this->stmt = $this->conn->prepare($sql);
    }

    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}