<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_usuario = (isset($_POST['id'])) ? $_POST['id'] : "";
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : "";
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
$documento = (isset($_POST['documento'])) ? $_POST['documento'] : "";
$id_rol = (isset($_POST['id_rol'])) ? $_POST['id_rol'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

        $query = $conn->prepare(
            "INSERT INTO usuarios( documento,nombre,apellido,telefono,id_rol) 
                    VALUES ('$documento','$nombre','$apellido','$telefono','$id_rol')"
        );
        $query->execute();
        $conn->close();

        header('location: index.php');
        break;

    case 'btnModificar':

        $actualizacionUsuario = $conn->prepare("UPDATE usuarios 
        SET documento='$documento', nombre='$nombre', apellido='$apellido', telefono='$telefono', id_rol='$id_rol'
        WHERE id='$id_usuario'");
        $actualizacionUsuario->execute();
        $conn->close();

        header('location: index.php'); // Redirigir a la página principal después de la modificación

        break;


    case 'btnEliminar':

        $eliminarProducto = $conn->prepare(" DELETE FROM usuarios
        WHERE id = '$id_usuario' ");

        // $consultaFoto->execute();
        $eliminarProducto->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;


}

/* Consultamos todos los productos  */
$consultaUsuarios = $conn->prepare("SELECT * FROM usuarios");
$consultaUsuarios->execute();
$listaUsuarios = $consultaUsuarios->get_result();
$conn->close();
