<?php include 'codeShopping.php'; ?>
<?php include("../Conexion/conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manillas</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- link Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/styles.css" rel="stylesheet" />

</head>

<body>
    <div class="container">
        <a class="d-flex justify-content-center py-5 w-100" href="../index.html">
            <img src="../assets/img/spk-logo.jpg" alt="logo">
        </a>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            <?php

            if ($listaProductos === 0) {

                echo "<h1>No hay productos aquí</h1>";

            } else {
                foreach ($listaProductos as $producto) {
                    ?>
                    <div>
                        <div class="card" style="width: 250px">
                            <img src="../Imagenes/Productos/<?php echo $producto['imagen']; ?>"
                                class="card-img-top object-fit-cover" height="200" alt="Producto">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $producto['nombre']; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $producto['descripcion']; ?>
                                </p>
                                <h6 class="card-subtitle mb-2 text-muted">$
                                    <?php echo $producto['precio']; ?>
                                </h6>
                                <div class="d-flex gap-2">
                                    <form action="" method="post" class="d-flex gap-2">

                                    <input type="hidden" name="id" id="id" value="<?php echo $producto['id'] ?>" />
                                    <input type="hidden" name="existencia" id="existencia" value="<?php echo $producto['existencia'] ?>" />
                                    <input type="hidden" name="precio" id="precio" value="<?php echo $producto['precio'] ?>" />

                                        <button type="submit" class="btn btn-primary" name="accion" value="btnComprar">
                                            <i class="fas fa-plus"></i>
                                            Comprar
                                        </button>
                                        <input required type="number" class="form-control" name="cantidad" id="cantidad" value="<?php echo $cantidad ?>"
                                            style="width:70px" placeholder="0">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

</body>

</html>

<?php include("../paginas/footer.php") ?>