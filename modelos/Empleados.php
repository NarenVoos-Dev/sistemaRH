<?php
include_once('config.php');

//Obtener empresas
function ObtenerEmpresas($conn) {
    $conn->set_charset('utf8');
    $sql = "SELECT * FROM empresa";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $empresas = array();
        while ($row = $resultado->fetch_assoc()) {
            $empresas[] = $row;
        }
        return json_encode($empresas);
    } else {
        return json_encode(array());
    }
}
//Obtener identificacion
function TipoIdentificacion($conn) {
    $conn->set_charset('utf8');
    $sql = "SELECT * FROM tipodocumento"; // Reemplaza con el nombre de tu tabla
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $tipoDocumento = array();
        while ($row = $resultado->fetch_assoc()) {
            $tipoDocumento[] = $row;
        }
        return json_encode($tipoDocumento); // Devolver los datos como JSON al cliente
    } else {
        return json_encode(array()); // Si no se encontraron datos, devolver un arreglo vacío
    }
}

//Obtener Perfiles
function Perfil($conn) {
    $conn->set_charset('utf8');
    $sql = "SELECT * FROM cargos"; // Reemplaza con el nombre de tu tabla
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $Perfil = array();
        while ($row = $resultado->fetch_assoc()) {
            $Perfil[] = $row;
        }
        return json_encode($Perfil); // Devolver los datos como JSON al cliente
    } else {
        return json_encode(array()); // Si no se encontraron datos, devolver un arreglo vacío
    }
}

//Obtener Empleados
function ObtenerEmpleados($conn){
    $conn->set_charset('utf8');
    $sql = "SELECT * FROM empleados";
    $resultado = $conn->query($sql);

    if($resultado-> num_rows > 0){
        $empleado = array();
        while ($row = $resultado->fetch_assoc()){
            $empleado[] = $row;
        }
        return json_encode($empleado);
    }else{
        return json_encode(array());
    }
}

//Obtener Año
function ObtenerAño($conn) {
    $conn->set_charset('utf8');
    $sql = "SELECT * FROM año"; // Reemplaza con el nombre de tu tabla
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $ano = array();
        while ($row = $resultado->fetch_assoc()) {
            $ano[] = $row;
        }
        return json_encode($ano); // Devolver los datos como JSON al cliente
    } else {
        return json_encode(array()); // Si no se encontraron datos, devolver un arreglo vacío
    }
}

//Obtener Año
function ObtenerMes($conn) {
    $conn->set_charset('utf8');
    $sql = "SELECT * FROM mes"; // Reemplaza con el nombre de tu tabla
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $mes = array();
        while ($row = $resultado->fetch_assoc()) {
            $mes[] = $row;
        }
        return json_encode($mes); // Devolver los datos como JSON al cliente
    } else {
        return json_encode(array()); // Si no se encontraron datos, devolver un arreglo vacío
    }
}

//Obtener motivos de deduccion o devengados
function ObtenerMotivos($conn){
    $conn->set_charset('utf8');
    $sql = "SELECT * FROM motivosnomina ORDER BY nombreMotivo ASC"; // Reemplaza con el nombre de tu tabla
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $motivosnomina = array();
        while ($row = $resultado->fetch_assoc()) {
            $motivosnomina[] = $row;
        }
        return json_encode($motivosnomina); // Devolver los datos como JSON al cliente
    } else {
        return json_encode(array()); // Si no se encontraron datos, devolver un arreglo vacío
    }
}

// Inicia el buffer de salida para evitar salidas no deseadas
ob_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'ObtenerEmpresas':
            echo ObtenerEmpresas($conn);
            break;
        case 'TipoIdentificacion':
            echo TipoIdentificacion($conn);
            break;
        case 'Perfil':
            echo Perfil($conn);
            break;
        case 'ObtenerEmpleados':
            echo ObtenerEmpleados($conn);
            break;
        case 'ObtenerAño':
            echo ObtenerAño($conn);
            break;
        case 'ObtenerMes':
            echo ObtenerMes($conn);
            break;

        case 'ObtenerMotivos':
            echo ObtenerMotivos($conn);
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
