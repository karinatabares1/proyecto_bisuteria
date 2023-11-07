<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : "";
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
$documento = (isset($_POST['documento'])) ? $_POST['documento'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

        $query = $conn->prepare(
            "INSERT INTO usuarios( documento,nombre,apellido,telefono,id_rol) 
                    VALUES ('$documento','$nombre','$apellido','$telefono','2')"
        );
        $query->execute();
        $conn->close();

        echo"<h4 class='bg-success text-white px-5 py-2 position-absolute end-0 top-0'>Cuenta creada</h4>";
        break;
}
