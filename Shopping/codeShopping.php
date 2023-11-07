<?php
include("../Conexion/conexion.php");

$id_producto = (isset($_POST['id'])) ? $_POST['id'] : "";
$existencia = (isset($_POST['existencia'])) ? $_POST['existencia'] : "";
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : "";

$cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

switch ($accion) {
    case 'btnComprar':

        // Si la cantidad supera la existencia, arroja un error
        if ($cantidad > $existencia) {
            echo "<p class='bg-danger text-white px-5 py-2 position-fixed top-0 left-0'>Solo hay $existencia unidades disponibles del producto seleccionado</p>";
        } else {
            // Si no, se actualiza la existencia del producto
            $consultaProductos = $conn->prepare("UPDATE productos SET existencia = $existencia - $cantidad WHERE id = $id_producto");
            $consultaProductos->execute();
            $fechaActual = date('Y-m-d H:i:s');
            
            // Obtiene la fecha actual
            $current = new DateTime();
            // Suma 5 días a la fecha actual
            $fechaSumada = $current->add(new DateInterval('P5D'));
            // Formatea la fecha sumada en el formato deseado (por ejemplo, 'Y-m-d')
            $fechaSumadaFormateada = $fechaSumada->format('Y-m-d');
            
            $total = $cantidad * $precio;

            // Se almacena la venta en la bd
            $consultaVentas = $conn->prepare("INSERT INTO ventas ( fecha_compra, fecha_entrega, cantidad_productos, total) 
            VALUES ('$fechaActual','$fechaSumadaFormateada','$cantidad', '$total')");
            $consultaVentas->execute();

            echo "<p class='bg-success text-white px-5 py-2 position-fixed top-0 left-0'>Compra exitosa. Tu compra será entregada el día <b>($fechaSumadaFormateada)</b></p>";
        }


        break;
}

/* Consultamos todos los productos */
$consultaProductos = $conn->prepare("SELECT * FROM productos WHERE existencia > 0");
$consultaProductos->execute();
$listaProductos = $consultaProductos->get_result();
$conn->close();

?>