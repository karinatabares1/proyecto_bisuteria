<?php include 'codeUsuarios.php'; ?>

<?php include("../paginas/head.php") ?>
<?php
include("../Conexion/conexion.php");

// Realizar consulta para obtener categorías
$usuariosQuery = $conn->query("SELECT * FROM roles");
$listaRoles = $usuariosQuery->fetch_all(MYSQLI_ASSOC);
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

                                <input type="hidden" name="id" id="id" placeholder=""
                                    value="<?php echo $id_usuario ?>">
                                <div class="form-group col-md-12">
                                    <label for="id_rol">Rol</label>
                                    <select class="form-select col-md-12" name="id_rol" id="id_rol">
                                        <?php foreach ($listaRoles as $rol): ?>
                                            <option value="<?php echo $rol['id']; ?>">
                                                <?php echo $rol['nombre']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="documento">Documento</label>
                                    <input required type="text" class="form-control" name="documento"
                                        id="documento" placeholder="" value="<?php echo $documento ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="nombre">Nombre</label>
                                    <input required type="text" class="form-control" name="nombre" id="nombre"
                                        placeholder="" value="<?php echo $nombre ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="apellido">Apellido</label>
                                    <input required type="text" class="form-control" name="apellido"
                                        id="apellido" placeholder="" value="<?php echo $apellido ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="telefono">Teléfono</label>
                                    <input required type="text" class="form-control" name="telefono"
                                        id="telefono" placeholder="" value="<?php echo $telefono ?>">
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
                Agregar Usuario
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row w-100 ms-0">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">ID Rol</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Borrar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php

                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaUsuarios->num_rows > 0) {

                        foreach ($listaUsuarios as $usuario) {

                            ?>

                            <tr>
                                <td>
                                    <?php echo $usuario['id'] ?>
                                </td>
                                <td>
                                    <?php echo $usuario['documento'] ?>
                                </td>
                                <td>
                                    <?php echo $usuario['nombre'] ?>
                                </td>
                                <td>
                                    <?php echo $usuario['apellido'] ?>
                                </td>
                                <td>
                                    <?php echo $usuario['telefono'] ?>
                                </td>
                                <td>
                                    <?php echo $usuario['id_rol'] ?>
                                </td>

                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                    <input type="hidden" name="nombre" value="<?php echo $usuario['nombre']; ?>">
                                    <input type="hidden" name="apellido" value="<?php echo $usuario['apellido']; ?>">
                                    <input type="hidden" name="telefono" value="<?php echo $usuario['telefono']; ?>">
                                    <input type="hidden" name="id_rol" value="<?php echo $usuario['id_rol']; ?>">
                                    <input type="hidden" name="documento" value="<?php echo $usuario['documento']; ?>">


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