<?php
include_once('config.php');
session_start();
//Sentencia informacion de los volantes de pago tabla volante
function TblDashboardNomina($conn){
    $conn->set_charset('utf8');
    $perfil = $_SESSION['profile'];
    $id_empleado = $_SESSION['empleado_id'];
    if($perfil != 1){
        $sql = "SELECT 
        id_volante_pago, 
        nombres_empleados,
        em.nombre_empresa AS empresa, 
        identificacion_empleado AS identificacion,
        v.id_mes,
        m.nombreMes,
        a.año, 
        etapa,
        quincena_empleado AS quincena,
        total_devengados AS devengado,
        total_deduccion AS deduccion,
        total_neto 
        FROM empleados e 
        JOIN volante_de_pago v 
        ON e.id_empleados = v.id_empleados 
        JOIN mes m 
        ON m.id_mes = v.id_mes
        JOIN año a
        ON a.id_año = v.id_año
        JOIN empresa em
        ON em.id_empresa = e.id_empresa_empleado
        WHERE e.id_empleados = $id_empleado";
    }else{
        $sql = "SELECT 
        id_volante_pago, 
        nombres_empleados,
        em.nombre_empresa AS empresa, 
        identificacion_empleado AS identificacion,
        v.id_mes,
        m.nombreMes,
        a.año, 
        etapa,
        quincena_empleado AS quincena,
        total_devengados AS devengado,
        total_deduccion AS deduccion,
        total_neto 
        FROM empleados e 
        JOIN volante_de_pago v 
        ON e.id_empleados = v.id_empleados 
        JOIN mes m 
        ON m.id_mes = v.id_mes
        JOIN año a
        ON a.id_año = v.id_año
        JOIN empresa em
        ON em.id_empresa = e.id_empresa_empleado";
    }

  
    $res = $conn->query($sql);
    
    if($res->num_rows > 0){
        $Volantes_de_pago = array();
        while($row = $res->fetch_assoc()){
            $Volantes_de_pago[] = $row;
        }
        return json_encode($Volantes_de_pago);
    }else{
        return json_encode(array());
    }
}
// Inicia el buffer de salida para evitar salidas no deseadas
ob_start();

if (isset($_GET['action']  )) {
    $action = $_GET['action'];
    switch ($action) {
        case 'TblDashboardNomina':
                echo TblDashboardNomina($conn);
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