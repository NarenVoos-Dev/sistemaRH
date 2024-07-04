<?php
include_once('config.php');

//CREAR EMPLEADO
function CrearEmpleado($conn){
    $empresa = $_POST['selectEmpresas'] ?? '';
    $nombreCompleto = $_POST['nombreEmpleado'] ?? '';
    $tipoDocumento = $_POST['tipoDocumento'] ?? '';
    $numeroDocumento = $_POST['numeroDocumento'] ?? '';
    $Perfiles = $_POST['Perfiles'] ?? '';
    $salarioEmpleado = $_POST['salarioEmpleado'] ?? '';

    // Preparar y ejecutar la consulta
    $sql = "INSERT INTO empleados (
                                    Nombres_empleados, 
                                    id_tipoDocumento_empleado,
                                    identificacion_empleado,
                                    id_cargo_empleado,
                                    id_empresa_empleado,
                                    salario_empleado
                                 ) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", 
                      $nombreCompleto, 
                      $tipoDocumento,
                      $numeroDocumento,
                      $Perfiles,
                      $empresa,
                      $salarioEmpleado
                    );

    if ($stmt->execute()) {
        return json_encode(['success' => 'Empleado creado con éxito']);
    } else {
        return json_encode(['error' => 'Error al crear empleado']);
    }
}

// Inicia el buffer de salida para evitar salidas no deseadas
ob_start();

if (isset($_POST['action'] )) {
    $action = $_POST['action'];
    switch ($action) {
        case 'Crear':
                echo CrearEmpleado($conn);
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
