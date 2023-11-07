<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");

$usuario = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
$contrasena = (isset($_POST['documento'])) ? $_POST['documento'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

switch ($accion) {
    case "btnLogin":

        $consulta = $conn->prepare("SELECT id_rol FROM usuarios WHERE telefono = ? AND documento = ?");
        $consulta->bind_param("ss", $usuario, $contrasena);
        $consulta->execute();

        $consulta->bind_result($idRol);

        if ($consulta->fetch()) {
            if ($idRol == 1) {
                // Redirige a paginas/index.php
                header("Location: ../paginas/index.php");
                exit();
            } elseif ($idRol == 2) {
                // Redirige a index.html
                header("Location: ../index.html");
                exit();
            } else {
                // Maneja otros valores de id_rol si es necesario
                echo "Rol desconocido";
            }
        } else {
            // No se encontraron usuarios con los parámetros proporcionados
            echo "<h4 class='bg-danger text-white px-5 py-2 position-fixed top-0'>Datos inválidos</h4>";
        }

        $consulta->close();

        break;
}

?>