<?php
session_start();
if(isset($_SESSION["profile"])){
    echo ('<script>window.location.href= ("Dashboard.php")</script>');
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

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/png" href="img/logoatul.ico">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../assets/sweetalert2/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-login p-5">
                                    <div class="text-center" id="frmLogin">
                                        <div class="col-lg-6 d-lg-block d-flex justify-content-center">
                                            <img src="" alt="" id="headerLogo" class="py-3 top-logo" width="100"
                                                heigth="600">
                                        </div>
                                        <h4 class="mb-4">Iniciar Sesión</h4>
                                        <div class="mb-3">
                                            <select class="form-control" id="selectEmpresas">
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col d-flex">
                                                <span class="p-2"><i class="far fa-id-card"></i></span>
                                                <input type="text" class="form-control" id="usuario"
                                                    placeholder="Numero de identificación">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col d-flex">
                                                <span class="p-2"><i class="far fa fa-lock"></i></span>
                                                <input type="password" class="form-control" id="passwords"
                                                placeholder="Contraseña">
                                            </div>
                                        </div>
                                        <div class="mb-3 show-password">
                                            <div class="col d-flex ">
                                                <input type="checkbox" name="show-pass" id="show-pass">
                                                <label for="show-pass">Mostrar contraseña</label>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" class="form-control  btn-login"
                                            >Iniciar</button>
                                        </div>
                                        <div class="reset-password">
                                            <a href="#">Olvide mi Contraseña</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-login p-5">
                                <img src="" alt="" class="py-5" id="logoLogin" width="400" heigth="400">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/js/cargarSelect.js"></script>
    <script src="../assets/js/login.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js" integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js" integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

</body>

</html>