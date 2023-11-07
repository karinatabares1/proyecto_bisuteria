<?php include 'codeLogin.php'; ?>

<?php include("../Conexion/conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login SENA</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon .jpg" />
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 bg-login-image d-flex justify-content-center align-items-center">
                                <img src="../assets/img/spk-logo.jpg" alt="logo">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Inicio de sesión</h1>
                                    </div>
                                    <form action="" method="post" class="user">
                                        <div class="form-group">
                                            <input required type="text" class="form-control form-control-user"
                                                id="telefono" placeholder="Teléfono" name="telefono"
                                                value="<?php echo $usuario ?>">
                                        </div>
                                        <div class="form-group">
                                            <input required type="password" class="form-control form-control-user"
                                                id="documento" name="documento" placeholder="Contraseña"
                                                value="<?php echo $contrasena ?>">

                                        </div>
                                        <button type="submit" name="accion" value="btnLogin"
                                            class="btn btn-primary btn-user btn-block">
                                            Ingresar
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center d-flex flex-column">
                                        <a class="small" href="../index.html">Quieres Volver al Inicio?</a>
                                        <p></p>
                                        <a class="small" href="../Registro/index.php">¿No tienes una cuenta?. Regístrate</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>