<?php
include_once('config.php');
session_start();
function login($conn){
    $conn->set_charset('utf8');
    $empresa = $_POST['empresa'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    
    $sql = "SELECT *, e.nombres_empleados AS nombreUsuario
                FROM usuarios u 
                JOIN empleados e 
                ON u.id_empleados = e.id_empleados 
                WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $res = $stmt->get_result();
    
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();

        if(password_verify($password, $row['password'])){
         
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['empleado_id'] = $row['id_empleados'];
            $_SESSION['nombrePefil'] =  $row['nombreUsuario'];
            $_SESSION['usuario'] = $row['username'];
            $_SESSION['profile'] = $row['profile'];
            
            echo json_encode(['success'=> true,'profile'=>$_SESSION['profile']]);
        }else{
            echo json_encode(['success'=> false, 'message' => 'Contraseña Incorrecta']);
        }
    }else{
        echo json_encode(['success'=>false,'message'=>'Usuario no existe']);
    }
}


ob_start();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'login':
            echo login($conn);
            break;
        default:
            echo json_encode(array("error" => "Acción no válida"));
    }
} else {
    echo json_encode(array("error" => "No se especificó ninguna acción"));
}

// Cerrar la conexión a la base de datos
$conn->close();

// Limpiar y desactivar el buffer de salida
ob_end_flush();

?>