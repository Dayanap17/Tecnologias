<?php
class Auth
{

    // database connection
    private $conn;

    // object properties
    public $userData;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login($usuario, $contraseña)
    {
        $query = "SELECT * FROM usuarios WHERE email = '{$usuario}' AND password = '{$contraseña}';";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($response) {
            return $response;
        } else {
            return false;
        }
    }

    public function register($usuario, $contraseña, $rol)
    {

        $query = "SELECT * FROM usuarios WHERE email = '{$usuario}';";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($response) {
            return false;
        } else {
            $query = "INSERT INTO `usuarios` (`email`, `password`, `rol`) VALUES ('{$usuario}', '{$contraseña}', '{$rol}');";
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
}
