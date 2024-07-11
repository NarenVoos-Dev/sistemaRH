<?php
session_start();
if(!isset($_SESSION["profile"])){
    echo ('<script>window.location.href= ("Login.php")</script>');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../assets/sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>    
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js" integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous"></script>
   <!--CSS DataTable--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
    

</head>

<body >
    <?php require_once('../componentes/navbar.php')?>
   
    <div class="container">
        <!-- Outer Row -->
        <div class="row container">
            <div class="col-xl-12 col-lg-12 col-md-9">
                <div class="col-lg d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="text-center">Bienvenido</h1>
                        <h2 class="text-center header-dashboard" id="NombreEmpleado"></h2>
                        <h3 class="text-center header-dashboard" id="identificacion"></h3>
                        <h3 class="text-center header-dashboard" id="perfil"></h5>
                    </div>
                </div>
                <div class="col-lg d-flex justify-content-center text-center" id="contenido">
                    <p>Aqui podras descargar tus volantes de pago solo presionando en el boton 
                    <span class="btn btn-light "><i class="far fa fa-print"></i> Print</span>
                    </p>
                </div>
            </div>
        </div> 
    </div>
    <div class="container mt-0">
                <table id="tblDashboard" class="table table-striped  nowrap" style="width:100%">
                    <thead class="text-center">
                        <tr>
                        <th  class="item-admin">Empleado</th>
                        <th  class="item-admin">Empresa</th>
                        <th >Mes</th>
                        <th >Fechas</th>
                        <th >Total devengado</th>
                        <th >Total Deducido</th>
                        <th >Neto a pagar</th>
                        <th >Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tblDashboardVolantes">
                        
                    </tbody>
                </table>
            </div>
    
    <section class="overlay"></section>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/navBar.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js" integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js" integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous"></script>
    <!--Data Table responsive javascript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

    <!-------->
</body>

</html>