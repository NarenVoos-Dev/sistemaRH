<?php
include_once('config.php');

//CREAR VOLANTE DE NOMINA
function GuardarVolante($conn){
    $idEmpleado = $_POST['idEmpleado'] ?? '';
    $quincena = $_POST['Quincena'] ?? '';
    $totalDevengado = $_POST['totalDevengado'] ?? '';
    $totalDeducido = $_POST['totalDeducido'] ?? '';
    $totalNomina = $_POST['totalNomina'] ?? '';
    $fchaGeneracion = date('Y-m-d H:i:s');
    $año = $_POST['año'];
    $mes =$_POST['mes'];
    $periodo = $_POST['periodo'];
    // Preparar y ejecutar la consulta
    $sql = "INSERT INTO volante_de_pago (
                                    id_empleados, 
                                    fecha_generacion,
                                    total_devengados,
                                    total_deduccion,
                                    total_neto,
                                    id_mes,
                                    id_año,
                                    etapa,
                                    quincena_empleado

                                 ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", 
                        $idEmpleado,
                        $fchaGeneracion,
                        $totalDevengado,
                        $totalDeducido,
                        $totalNomina,
                        $mes,
                        $año,
                        $periodo,
                        $quincena
                    );

    if ($stmt->execute()) {
        $volanteId = $conn->insert_id;
        return json_encode(['success' => 'Empleado creado con éxito','volanteId' => $volanteId]);
    } else {
        return json_encode(['error' => 'Error al crear empleado']);
    }
}

function registrarDetalles($conn){
    //Recuperamos los datos de los formularios 
    $idVolante = $_POST['IdVolante'];
    $idEmpleado =$_POST['idEmpleado'];
    // Sql del insert para la tabla devengados
    $sql_devengado = "INSERT INTO devengados (
        id_empleado, 
        id_motivo,
        descripcion_motivo,
        montoDevengado,
        id_volante
     ) VALUES (?, ?, ?, ?, ?)";
        // Sql del insert para la tabla deducciones
    $sql_deducido = "INSERT INTO deducciones (
        id_empleado, 
        id_motivo,
        descripcion_motivo,
        montoDeducido,
        id_volante
        ) VALUES (?, ?, ?, ?, ?)";
    

    //Preparamos la sentenci de devegados
    $stmt1 = $conn->prepare($sql_devengado);
    $stmt2 = $conn->prepare($sql_deducido);
    if($stmt1 ===false){
        return json_encode(['error'=>'Error en la preparacion de la declaracion'.$conn->error]);
    }
    if($stmt2 ===false){
        return json_encode(['error'=>'Error en la preparacion de la declaracion'.$conn->error]);
    }
    //paametrizamos la sentencia para la ejecucion
    $stmt1->bind_param("sssss",
    $idEmpleado,$idMotivo,$descripMotivo,$monto,$idVolante );
    $stmt2->bind_param("sssss",
    $idEmpleado,$idMotivo,$descripMotivo,$monto,$idVolante );

    //Decodificar el JSON de devengados
    $data1 = json_decode($_POST['jsonStringDevengados'], true);
    if ($data1 === null) {
        return json_encode(['error' => 'Error al decodificar el JSON']);
    }
    $data2 = json_decode($_POST['jsonStringDeduccion'], true);
    if ($data1 === null) {
        return json_encode(['error' => 'Error al decodificar el JSON']);
    }
    $successCount1 = 0;
    $successCount2 = 0;
    $errors = [];
    foreach($data1 as $item){
        $idMotivo = $item['idMotivo'] ?? null;
        $descripMotivo = $item['DescripcionMotivo'] ?? null;
        $monto = $item['ValorDevengado'] ?? null;
        if($stmt1->execute()){
            $successCount1++;
        }else{
            $errors[] = "Error en el registro de el array: ".$stmt->error;
        }
    }

    foreach($data2 as $item){
        $idMotivo = $item['idMotivo'] ?? null;
        $descripMotivo = $item['DescripcionMotivo'] ?? null;
        $monto = $item['ValorDeducido'] ?? null;
        if($stmt2->execute()){
            $successCount2++;
        }else{
            $errors[] = "Error en el registro de el array: ".$stmt->error;
        }
    }
    
    if(empty($errors)){
        return json_encode(['success'=>"Se crearon volantes con exito"]);
    }else {
        return json_encode(['error' => $errors]);
    }
    
}
//********  FUNCIONES PARA DESPRENDIBLE DE PAGOS  ******* *//
function datoEmpleados($conn){
    $id = $_POST['id'];
    $stmt = $conn->prepare(
        "SELECT v.id_volante_pago, e.Nombres_empleados AS nombre_empleado, e.identificacion_empleado AS identificacion, em.nombre_empresa AS nombre_empresa,em.id_empresa AS idEmpresa, m.nombreMes AS mes, v.etapa AS periodo, e.salario_empleado, v.quincena_empleado, total_devengados, total_deduccion, total_neto FROM volante_de_pago v JOIN empleados e ON v.id_empleados = e.id_empleados JOIN empresa em ON e.id_empresa_empleado = em.id_empresa LEFT JOIN mes m ON v.id_mes = m.id_mes WHERE v.id_volante_pago =?"

    );
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if($res->num_rows > 0){
        $items = array();
        while($row = $res->fetch_assoc()){
            $items[] = $row;
        }
        return json_encode($items);
    }else{
        echo json_encode(['error'=>'Item no encontrado']);
    }
}

// fila de deducciones
function itemsDeduccion($conn){
    $id = $_POST['id'];
    $stmt = $conn->prepare("SELECT d.descripcion_motivo,d.montoDeducido FROM deducciones d WHERE d.id_volante = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $respuestItemsDeduccion = $stmt->get_result();
    if($respuestItemsDeduccion->num_rows > 0){
        $itemsDeduccion = array();
        while($row = $respuestItemsDeduccion->fetch_assoc()){
            $itemsDeduccion[] = $row;
        }
        return json_encode($itemsDeduccion);
    }else{
        echo json_encode(['error'=>'Item no encontrado']);
    }
}

// fila de devengados
function itemsDevengado($conn){
    $id = $_POST['id'];
   
    $stmt = $conn->prepare("SELECT d.descripcion_motivo,d.montoDevengado FROM devengados d WHERE d.id_volante = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $respuestItemsDevengado = $stmt->get_result();
    if($respuestItemsDevengado->num_rows > 0){
        $itemsDevengado = array();
        while($row = $respuestItemsDevengado->fetch_assoc()){
            $itemsDevengado[] = $row;
        }
        return json_encode($itemsDevengado);
    }else{
        echo json_encode(['error'=>'Item no encontrado']);
    }
}

// Inicia el buffer de salida para evitar salidas no deseadas
ob_start();

if (isset($_POST['action'] )) {
    $action = $_POST['action'];
    switch ($action) {
        case 'GuardarVolante':
                echo GuardarVolante($conn);
                break;
        case 'registrarDetalles':
            echo registrarDetalles($conn);
            break;
        case 'desprendibles':
            echo desprendibleVolante($conn);
            break;
        case 'itemsDeduccion':
            echo itemsDeduccion($conn);
            break;
        case 'itemsDevengado':
            echo itemsDevengado($conn);
            break;
        case 'datoEmpleados':
            echo datoEmpleados($conn);
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
