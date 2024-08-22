<?php
$config = require 'config.php';

class Auth
{
    private $host;
    private $username_db;
    private $password_db;
    private $database;
    private $pdo;
    private $sql_get = "SELECT * FROM tbuser WHERE username = :username AND password = :password AND token = :token";

    public function __construct($config)
    {
        $this->host = $config['auth_database']['host'];
        $this->username_db = $config['auth_database']['username'];
        $this->password_db = $config['auth_database']['password'];
        $this->database = $config['auth_database']['database'];

        $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username_db, $this->password_db);
    }

    public function check_login($token, $username, $password)
    {
        $stmt = $this->pdo->prepare($this->sql_get);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password,
            ':token' => $token
        ]);

        return $stmt->rowCount() > 0;
    }
}
