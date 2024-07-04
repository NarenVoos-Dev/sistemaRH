<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="..\css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/volante.css">
</head>

<body>
<div class="container">
        <div class="row contenedor">
            <div class="container">
                <div class="card-body text-center">
                    <img src="../../assets/img/logo2.png" id="logoVolante" alt="" >
                </div>
            </div>
            <div class="row container mt-2 mb-2 px-5" >
                <div class="card" id="data-volante">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Nombre empleado: <span id="nombre_empleado">  </span></p>
                            </div>
                            <div class="col-md-6">
                                <p>Empresa: <span id="empresa">  </span></p>
                            </div>
                            <div class="col-md-6">
                                <p>Identificacion: <span id="cedula"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p>Salario basico: $<span id="salario"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p>Mes: <span id="mes"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p>Periodo de pago: <span id="periodo"></span></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card " id="data-volante">
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-dark tabla">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">CONCEPTO</th>
                                        <th scope="col">DEVENGADOS</th>
                                        <th scope="col">DEDUCCIONES</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>Quincena</td>
                                        <td>$ <span id="quincena"></span></td>
                                        <td></td>
                                    </tr>                  
                                </tbody>
                                <tbody class="text-center" id="itemDevengado">                  
                                </tbody>
                                <tbody class="text-center" id="itemDeducido">  
                                </tbody>
                                <tbody class="text-center table table">
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>$ <span id="totalDevengado"></span></td>
                                        <td>$ <span id="totalDeducido"></span></td>
                                    </tr>                  
                                </tbody>
                                <tbody class="text-center table table">
                                    <tr>
                                        <td>Total pago de nomina</td>
                                        <td colspan="2">$ <span id="totalPago"></span></td>
                                    </tr>                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/desprendible.js"></script>
</body>

</html>