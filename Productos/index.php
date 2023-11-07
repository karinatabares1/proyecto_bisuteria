<?php include 'codeProductos.php'; ?>

<?php include("../paginas/head.php") ?>
<?php
include("../Conexion/conexion.php");

// Realizar consulta para obtener categorías
$categoriasQuery = $conn->query("SELECT id, nombre FROM categorias");
$categorias = $categoriasQuery->fetch_all(MYSQLI_ASSOC);
?>

<div class="container">
    <div class="row">



        <!-- enctype="multipart/form-data" se utiliza para tratar la fotografia -->
        <form action="" method="post" enctype="multipart/form-data">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Producto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                                <input type="hidden" name="id_producto" id="id_producto" placeholder=""
                                    value="<?php echo $id_producto ?>">
                                <div class="form-group col-md-12">
                                    <label for="nombre">Nombre</label>
                                    <input required type="text" class="form-control" require name="nombre" id="nombre"
                                        placeholder="" value="<?php echo $nombre ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="descripcion">Descripción</label>
                                    <input required type="text" class="form-control" require name="descripcion"
                                        id="descripcion" placeholder="" value="<?php echo $descripcion ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="precio">Precio</label>
                                    <input required type="number" class="form-control" require name="precio" id="precio"
                                        placeholder="" value="<?php echo $precio ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="existencia">Existencia</label>
                                    <input required type="number" class="form-control" require name="existencia"
                                        id="existencia" placeholder="" value="<?php echo $existencia ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="id_categoria">Categoría</label>
                                    <select class="form-select col-md-12" name="id_categoria" id="id_categoria">
                                        <?php foreach ($categorias as $categoria): ?>
                                            <option value="<?php echo $categoria['id']; ?>">
                                                <?php echo $categoria['nombre']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="imagen">Imagen</label>
                                    <!-- El atributo accept image .... solo acepta formatos de imagen -->
                                    <input type="file" class="form-control" require accept="image/*" name="imagen"
                                        id="imagen" placeholder="" value="<?php echo $imagen ?>">
                                    <br>
                                </div>
                            </div>
                        </div>

                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer">

                            <button value="btnAgregar" class="btn btn-success" type="submit"
                                name="accion">Agregar</button>
                            <button value="btnModificar" class="btn btn-warning" type="submit"
                                name="accion">Modificar</button>
                            <button value="btnCancelar" class="btn btn-secondary" type="submit"
                                name="accion">Cancelar</button>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Producto
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row w-100 ms-0">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Existencia</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Borrar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php

                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaProductos->num_rows > 0) {

                        foreach ($listaProductos as $producto) {

                            ?>

                            <tr>
                                <td>
                                    <?php echo $producto['id'] ?>
                                </td>
                                <td>
                                    <?php echo $producto['nombre'] ?>
                                </td>
                                <td>
                                    <?php echo $producto['descripcion'] ?>
                                </td>
                                <td>
                                    <?php echo $producto['precio'] ?>
                                </td>
                                <td>
                                    <?php echo $producto['existencia'] ?>
                                </td>

                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                    <input type="hidden" name="nombre" value="<?php echo $producto['nombre']; ?>">
                                    <input type="hidden" name="descripcion" value="<?php echo $producto['descripcion']; ?>">
                                    <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                                    <input type="hidden" name="existencia" value="<?php echo $producto['existencia']; ?>">
                                    <input type="hidden" name="id_categoria" value="<?php echo $producto['id_categoria']; ?>">
                                    <input type="hidden" name="imagen" value="<?php echo $producto['imagen']; ?>">


                                    <td><input type="submit" class="btn btn-info" value="Seleccionar"></td>
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