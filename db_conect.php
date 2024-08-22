<?php

class Conection
{
    private $servername;
    private $username;
    private $password;
    private $database;

    public function __construct($servername, $username, $password, $database)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    static function create_conection($servername, $username, $password, $database)
    {
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }


    public static function get_conection($username)
    {
        $sql = "SELECT * FROM tbuser WHERE username = :username";
        $pdo = new PDO("mysql:host=localhost;dbname=api-json-real", 'root', '12022008');
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
