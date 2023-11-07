<?php include 'codeVentas.php'; ?>

<?php include("../paginas/head.php") ?>
<?php include("../Conexion/conexion.php"); ?>

<div class="container">
    <div class="row">
        <!-- Final del Formulario -->
        <div class="row w-100 ms-0">
            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Fecha Compra</th>
                        <th scope="col">Fecha Entrega</th>
                        <th scope="col">Cantidad Productos</th>
                        <th scope="col">Total</th>
                        <th scope="col">Borrar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php

                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaVentas->num_rows > 0) {

                        foreach ($listaVentas as $venta) {

                            ?>

                            <tr>
                                <td>
                                    <?php echo $venta['id'] ?>
                                </td>
                                <td>
                                    <?php echo $venta['fecha_compra'] ?>
                                </td>
                                <td>
                                    <?php echo $venta['fecha_entrega'] ?>
                                </td>
                                <td>
                                    <?php echo $venta['cantidad_productos'] ?>
                                </td>
                                <td>
                                    <?php echo $venta['total'] ?>
                                </td>

                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $venta['id']; ?>">
                                    <input type="hidden" name="fecha_compra" value="<?php echo $venta['fecha_compra']; ?>">
                                    <input type="hidden" name="fecha_entrega" value="<?php echo $venta['fecha_entrega']; ?>">
                                    <input type="hidden" name="cantidad_productos"
                                        value="<?php echo $venta['cantidad_productos']; ?>">
                                    <input type="hidden" name="total" value="<?php echo $venta['total']; ?>">
                                    
                                    <td><button value="btnEliminar" class="btn btn-danger" type="submit"
                                            name="accion">Eliminar</button></td>

                                </form>


                            </tr>
                            <?php

                        }
                    } else {

                        echo "<h2> No tenemos resultados </h2>";
                    }

                    ?>
                </tbody>
            </table>

        </div>


    </div>
</div>

<?php include("../paginas/footer.php") ?>