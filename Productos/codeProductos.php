
<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_producto = (isset($_POST['id'])) ? $_POST['id'] : "";

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : "";
$existencia = (isset($_POST['existencia'])) ? $_POST['existencia'] : "";
$id_categoria = (isset($_POST['id_categoria'])) ? $_POST['id_categoria'] : "";
$imagen = (isset($_FILES['imagen']["name"])) ? $_FILES['imagen']["name"] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

        $fecha = new DateTime();
        //Se crea el nombre de la imagen.... si no tenemos fotos por defecto toma imagen.jpg
        $nombreFoto = ($imagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"] : "imagen.jpg";

        $nombreFoto = $imagen;

        //nombre que devuelve PHP de la imagen
        $tmpFoto = $_FILES["imagen"]["tmp_name"];

        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Continuar con el proceso de carga y almacenamiento de la imagen.


            if ($tmpFoto != "") {
                $directorioDestino = "../Imagenes/Productos/";

                // Verificar si el directorio de destino existe, si no, crearlo
                if (!file_exists($directorioDestino)) {
                    mkdir($directorioDestino, 0777, true); // 0777 otorga todos los permisos, ajusta según sea necesario
                }

                /* Movemos el archivo a la carpeta imagenes  */
                move_uploaded_file($tmpFoto, $directorioDestino . $nombreFoto);


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionEmpleados = $conn->prepare(
                    "INSERT INTO productos( nombre, descripcion, precio, existencia, imagen, id_categoria) 
                    VALUES ('$nombre','$descripcion','$precio','$existencia', '$imagen', '$id_categoria')"
                );



                $insercionEmpleados->execute();
                $conn->close();

                echo " <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";


                header('location: index.php');
            } else {
                echo "Problemas";
            }
        } else {
            // Manejar el error de carga de la imagen.
            echo "Error al cargar la imagen: " . $_FILES['foto']['error'];
        }




        break;

    case 'btnModificar':
        $id_producto = $_POST['id_producto']; // Obtener el ID del producto a modificar

        // Resto de las variables que se reciben del formulario
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $existencia = $_POST['existencia'];
        $id_categoria = $_POST['id_categoria'];

        // Verificar si se subió una nueva imagen
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $fecha = new DateTime();
            $nombreFoto = $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"];
            $tmpFoto = $_FILES["imagen"]["tmp_name"];

            // Continuar con el proceso de carga y almacenamiento de la nueva imagen.
            $directorioDestino = "../Imagenes/Productos/";

            if (!file_exists($directorioDestino)) {
                mkdir($directorioDestino, 0777, true);
            }

            move_uploaded_file($tmpFoto, $directorioDestino . $nombreFoto);
        } else {
            // Si no se subió una nueva imagen, mantener la imagen existente en la base de datos
            $nombreFoto = "spk-logo.jpg"; // 'imagen_original' es el nombre del campo oculto que almacena el nombre de la imagen actual en el formulario de edición.
        }

        // Preparar la consulta para actualizar el producto en la base de datos
        $actualizacionProducto = $conn->prepare("
                UPDATE productos 
                SET nombre='$nombre', descripcion='$descripcion', precio='$precio', existencia='$existencia', imagen='$nombreFoto', id_categoria='$id_categoria'
                WHERE id='$id_producto'
            ");

        $actualizacionProducto->execute();
        $conn->close();

        echo "<script>
                    swal('Producto modificado!', 'El producto ha sido modificado exitosamente.', 'success');
                    </script>";

        header('location: index.php'); // Redirigir a la página principal después de la modificación

        break;


    case 'btnEliminar':

        $eliminarProducto = $conn->prepare(" DELETE FROM productos
        WHERE id = '$id_producto' ");

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
$consultaProductos = $conn->prepare("SELECT * FROM productos");
$consultaProductos->execute();
$listaProductos = $consultaProductos->get_result();
$conn->close();
