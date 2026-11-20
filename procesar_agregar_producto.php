<?php
// procesar_agregar_producto.php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'conexion.php';

$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$talla = $_POST['talla'];

// 1. Insertar el producto en tu tabla 'productos'
$sql_producto = "INSERT INTO productos (precio, talla, descripcion) VALUES ('$precio', '$talla', '$descripcion')";

if (mysqli_query($conexion, $sql_producto)) {
    // Obtenemos el ID del producto que se acaba de crear
    $id_nuevo_producto = mysqli_insert_id($conexion);
    
    // 2. OBLIGATORIO: Crear su registro de inventario con stock inicial (ej: 10 unidades)
    $sql_inventario = "INSERT INTO inventario (id_producto, stock) VALUES ('$id_nuevo_producto', 10)";
    mysqli_query($conexion, $sql_inventario);

    echo "<script>
            alert('¡Producto agregado e inventariado con éxito!');
            window.location.href = 'admin_productos.php';
          </script>";
} else {
    echo "Error al guardar el producto: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>