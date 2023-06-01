<?php
// required headers

include_once '../config/headers.php';
// include database and object files
include_once '../config/database.php';
include_once '../repository/auth.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$Auth = new Auth($db);

$data = json_decode(file_get_contents("php://input"));

$Auth->userData = $data;

$Data = $Auth->register($data->username, $data->password, $data->rol);
if ($Data) {
    http_response_code(200);
    echo json_encode(array("message" => "Exito", "body" => "Usuario registrado correctamente", "foot" => "success"));
} else {
    http_response_code(500);
    echo json_encode(array("message" => "Algo fallo", "body" => "el usuario ya esta creado en sistema", "foot" => "error"));
}
