<?php
class Files
{
    // database connection
    private $conn;

    // object properties
    public $userData;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function uploadFile($fileEncript, $idUsuario, $idPregunta)
    {
        $query = "INSERT INTO documentos (documento, idusuario, nopregunta) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $fileEncript);
        $stmt->bindParam(2, $idPregunta);
        $stmt->bindParam(3, $idUsuario);
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}
