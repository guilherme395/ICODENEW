<?php

session_start();

class Conn
{
    private $conn;
    private const HOST = "localhost";
    private const USER = "root";
    private const PASS = "";
    private const BANCO = "icodenew";

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->conn = new PDO("mysql:dbname=" . self::BANCO . ";host=" . self::HOST, self::USER, self::PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "ERROR DB: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
