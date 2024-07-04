<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomina</title>
       <!-- Custom fonts for this template-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js" integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js" integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require_once('../componentes/navbar.php')?>
    <div class="container">
        <div class="justify-contente-center">
            <h3 class="mb-4">CREAR VOLANTE DE NOMINA</h3>
            <div class="card-nomina card">
                <?php include_once ('../componentes/CrearVolanteNomina/VolanteNominaEmpleados.php'); ?>
                <?php include_once ('../componentes/CrearVolanteNomina/VolanteNominaDatos.php'); ?>
                <!-- Inicia la seccion de devengados-->
                <?php include_once ('../componentes/CrearVolanteNomina/VolanteNominaDevengados.php'); ?>
                <!-- Inicia la seccion de deducciones-->
                <?php include_once ('../componentes/CrearVolanteNomina/VolanteNominaDeduccion.php'); ?> 
                <?php include_once ('../componentes/CrearVolanteNomina/TotalesNomina.php'); ?> 
            </div>
        </div>
    </div>
    <section class="overlay"></section>

    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/cargarSelect.js"></script>
    <script src="../assets/js/nomina.js"></script>
    <script src="../assets/js/empleado.js"></script>
    <script src="../assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../assets/js/navBar.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js" integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js" integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous"></script>

</body>





</html>