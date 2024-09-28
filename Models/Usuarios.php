<?php

require_once("../Config/Conn.php");

class Usuarios
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Conn())->getConnection();
    }

    public function getAllUser()
    {
        try {
            $query = "SELECT * FROM clientes;";
            $stmt = $this->conn->query($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return "Erro: " . $e->getMessage();
        }
    }

    public function insertUser($name, $email, $pass)
    {
        try {
            $query = "INSERT INTO clientes (nome, email, senha) VALUES(:nome, :email, :pass)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":nome", $name);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":pass", $pass);
            $stmt->execute();
            
            return $this->conn->lastInsertId();
        } catch (\PDOException $e) {
            return "Erro: " . $e->getMessage();
        }
    }
}
