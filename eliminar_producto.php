<?php
// eliminar_producto.php
session_start();
include 'conexion.php';

// Validar estrictamente que solo el administrador pueda ejecutar esta acción
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    die("Acceso denegado de seguridad.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_producto = $_POST['id_producto'];

    // Ejecutamos el borrado directo de la tabla 'productos'
    // Gracias a tu 'ON DELETE CASCADE', el registro en 'inventario' se borrará automáticamente
    $sql_borrar = "DELETE FROM productos WHERE id_producto = '$id_producto'";

    if (mysqli_query($conexion, $sql_borrar)) {
        echo "<script>
                alert('¡Producto eliminado correctamente del sistema!');
                window.location.href = 'admin_productos.php';
              </script>";
    } else {
        echo "Error al intentar eliminar el producto: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>

