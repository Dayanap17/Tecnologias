<?php
// required headers

include_once '../config/headers.php';
// include database and object files
include_once '../config/database.php';
include_once '../repository/files.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$File = new Files($db);

if($_FILES){

    $archivo_nombre=$_FILES['file']['name'];
    $archivo_tipo = $_FILES['file']['type'];
    $archivo_temp = $_FILES['file']['tmp_name'];
    $idpregunta = $_POST['idusuario'];
    $idusuario = $_POST['nopregunta'];

    //convertir la imagen en código binario
    $archivo_binario = (file_get_contents($archivo_temp));

    $response = $File->uploadFile($archivo_binario, $idusuario, $idpregunta);
    if ($response) {
        http_response_code(200);
        echo json_encode(array("message" => "Exito", "body" => "se cargo el archivo", "foot" => "success"));
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Error", "body" => "el usuario o la contraseña no coinciden", "foot" => "error"));
    }
}else{
    echo json_encode(array("message" => "Vacio", "body" => "No cargo ningun archivo", "foot" => "warning"));
}