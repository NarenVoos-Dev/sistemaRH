<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado</title>
    <script src="../assets/sweetalert2/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>

<body>
    <?php require_once('../componentes/navbar.php')?>
    <div class="container">
        <div class="row">
            <div class="d-flex">
                <form id="frmCrearEmpleado" class="mt-4">
                    <div class="container-fluid d-flex align-items-center">

                        <h5>DATOS DEL EMPLEADO</h5>
                    </div>

                    <div class="row" id="">
                        <div class="col-md-6">
                            <!--Empresa-->
                            <div class="form-group">
                                <label for="">EMPRESA</label>
                                <select class="form-control" id="selectEmpresas" name="selectEmpresas">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="campo3">NOMBRE COMPLETO</label>
                                <!--Nombre completo--->
                                <input type="text" class="form-control" id="nombreEmpleado" name="nombreEmpleado">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--tipo de documento-->
                            <div class="form-group">
                                <label for="">TIPO DE DOCUMENTO</label>
                                <select class="form-control" id="tipoDocumento" name="tipoDocumento">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="campo5">NUMERO DE DOCUMENTO</label>
                                <!--Numero de identificacion --->
                                <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--Cargo del empleado-->
                            <div class="form-group">
                                <label for="">PERFIL O CARGO</label>
                                <select class="form-control" id="Perfiles" name="Perfiles">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="campo5">Salario </label>
                            <!--Salario empleado --->
                            <input type="text" class="form-control" id="salarioEmpleado" name="salarioEmpleado">
                        </div>
                    </div>

                    <input type="text" class="form-control" id="idPaciente" name="idPaciente" style="display:none;">
                    <button type="submit" class="btn btn-success mt-3" id="buttonCrearEmpleado"><i class="fa-regular fa fa-save"></i> Guardar
                        empleado</button>
                </form>
            </div>
        </div>
    </div>

    <section class="overlay"></section>
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/empleado.js"></script>
    <script src="../assets/js/cargarSelect.js"></script>
    <script src="../assets/js/navBar.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js" integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js" integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous"></script>




</body>

</html>