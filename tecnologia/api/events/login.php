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

$Data = $Auth->login($data->username, $data->password);
if ($Data) {
    http_response_code(200);
    echo json_encode(array("message" => "Exito", "body" => "Bienvenido!!", "foot" => "success", "rol" => $Data));
} else {
    http_response_code(401);
    echo json_encode(array("message" => "Error", "body" => "el usuario o la contraseña no coinciden", "foot" => "error"));
}
