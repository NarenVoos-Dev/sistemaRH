<?php
include_once('config.php');
session_start();
//Validar inicio de session si existe o no 
function validarSesion($conn){
    header('Content-Type: application/json');
    $response = [
        'profile' => isset($_SESSION['profile']) ? $_SESSION['profile'] : '',
        'usuario' => isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '',
        'nombreUsuario' => isset($_SESSION['nombrePefil']) ? $_SESSION['nombrePefil'] : ''
    ];
    echo json_encode($response);

};
//Cerrar Session 
function CerrarSesion($conn){
    session_unset();
    session_destroy();
    $response = [
        'exit' => true,
        'message' => 'Cerrando....'
    ];
    echo json_encode($response);
};

ob_start();
if(isset($_GET['action'])){
    $action = $_GET['action'];

    switch($action){
        case 'validarSesion':
            echo validarSesion($conn);
            break;
        case 'CerrarSesion':
            echo CerrarSesion($conn);
            break;
        default:
            echo json_encode(array("error" =>"Acción no válida"));
    }
}else {
    echo json_encode(array("error" => "No se especificó ninguna acción"));
}

// Cerrar la conexión a la base de datos
$conn->close();

// Limpiar y desactivar el buffer de salida
ob_end_flush();
?>