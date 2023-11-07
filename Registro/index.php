<?php include 'codeRegistro.php'; ?>

<?php include("../Conexion/conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon .jpg" />
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary py-10">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="" method="post" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required type="text" class="form-control form-control-user" id="nombre"
                                            name="nombre" placeholder="Nombre(s)" value="<?php echo $nombre ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control form-control-user" id="apellido"
                                            name="apellido" placeholder="Apellido(s)" value="<?php echo $apellido ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input required type="text" class="form-control form-control-user" id="documento"
                                        name="documento" placeholder="Documento" value="<?php echo $documento ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" class="form-control form-control-user" id="telefono"
                                        name="telefono" placeholder="Teléfono" value="<?php echo $telefono ?>">
                                </div>
                                <button type="submit" name="accion" value="btnAgregar"
                                    class="btn btn-primary btn-block">
                                    Enviar
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="../Login/index.php">Ya tienes una cuenta? Inicia!</a>
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