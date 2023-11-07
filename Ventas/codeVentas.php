<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");

//Recibimos las variables enviadas
$id_venta = (isset($_POST['id'])) ? $_POST['id'] : "";
$fechaCompra = (isset($_POST['fecha_compra'])) ? $_POST['fecha_compra'] : "";
$fechaEntrega = (isset($_POST['fecha_entrega'])) ? $_POST['fecha_entrega'] : "";
$cantidad = (isset($_POST['cantidad_productos'])) ? $_POST['cantidad_productos'] : "";
$total = (isset($_POST['total'])) ? $_POST['total'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

        $query = $conn->prepare(
            "INSERT INTO ventas( fecha_compra,fecha_entrega,cantidad_productos,total ) 
                    VALUES ('$fecha_compra','$fecha_entrega','$cantidad_productos','$total')"
        );
        $query->execute();
        $conn->close();

        header('location: index.php');
        break;

    case 'btnModificar':

        $actualizacionVentas = $conn->prepare("UPDATE ventas 
        SET fecha_compra='$fecha_compra',fecha_entrega='$fecha_entrega',cantidad_productos='$cantidad_productos',total='$total'
        WHERE id='$id_venta'");
        $actualizacionVentas->execute();
        $conn->close();

        header('location: index.php'); // Redirigir a la página principal después de la modificación

        break;


    case 'btnEliminar':

        $eliminarVentas = $conn->prepare(" DELETE FROM ventas
        WHERE id = '$id_venta' ");

        // $consultaFoto->execute();
        $eliminarVentas->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;


}

/* Consultamos todos los productos  */
$consultaVentas = $conn->prepare("SELECT * FROM ventas");
$consultaVentas->execute();
$listaVentas = $consultaVentas->get_result();
$conn->close();
