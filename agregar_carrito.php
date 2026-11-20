<?php
// agregar_carrito.php
session_start();
include 'conexion.php';

// 1. Validar que el usuario haya iniciado sesión para poder comprar
if (!isset($_SESSION['usuario'])) {
    echo "<script>
            alert('Debes iniciar sesión para agregar productos al carrito.');
            window.location.href = 'loginframework.php';
          </script>";
    exit();
}

$nombre_usuario = $_SESSION['usuario'];
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];

// 2. Obtener el id_cliente asociado al usuario conectado a través de tu tabla intermedia 'cliente_usuario'
$sql_cliente = "SELECT id_cliente FROM cliente_usuario 
                WHERE id_usuario = (SELECT id_usuario FROM usuarios WHERE nombre_usuario = '$nombre_usuario') 
                AND estado = 'Activo' LIMIT 1";
$res_cliente = mysqli_query($conexion, $sql_cliente);
$row_cliente = mysqli_fetch_assoc($res_cliente);

if (!$row_cliente) {
    die("Error de consistencia: No se encontró un perfil de cliente para este usuario.");
}
$id_cliente = $row_cliente['id_cliente'];

// 3. Buscar si este cliente ya tiene un registro en la tabla 'carro_compras'
$sql_carro = "SELECT id_carro FROM carro_compras WHERE id_cliente = '$id_cliente' LIMIT 1";
$res_carro = mysqli_query($conexion, $sql_carro);

if (mysqli_num_rows($res_carro) > 0) {
    // Si ya existe su carro, capturamos su ID
    $row_carro = mysqli_fetch_assoc($res_carro);
    $id_carro = $row_carro['id_carro'];
} else {
    // Si no tiene un carro activo, lo creamos en la tabla 'carro_compras'
    $sql_nuevo_carro = "INSERT INTO carro_compras (id_cliente, compra) VALUES ('$id_cliente', 0.00)";
    mysqli_query($conexion, $sql_nuevo_carro);
    $id_carro = mysqli_insert_id($conexion);
}

// 4. Verificar si el producto YA estaba dentro del carrito (para no duplicar filas, sino sumar cantidad)
$sql_detalle = "SELECT id_detalle_carro, cantidad FROM detalle_carro 
                WHERE id_carro = '$id_carro' AND id_producto = '$id_producto' LIMIT 1";
$res_detalle = mysqli_query($conexion, $sql_detalle);

if (mysqli_num_rows($res_detalle) > 0) {
    // Si ya existía el artículo en el carro, actualizamos la cantidad sumándole la nueva
    $row_detalle = mysqli_fetch_assoc($res_detalle);
    $nueva_cantidad = $row_detalle['cantidad'] + $cantidad;
    $sql_update = "UPDATE detalle_carro SET cantidad = '$nueva_cantidad' WHERE id_carro = '$id_carro' AND id_producto = '$id_producto'";
    mysqli_query($conexion, $sql_update);
} else {
    // Si es la primera vez que agrega este artículo, hacemos un INSERT en la intermedia 'detalle_carro'
    $sql_insert_detalle = "INSERT INTO detalle_carro (id_carro, id_producto, cantidad) VALUES ('$id_carro', '$id_producto', '$cantidad')";
    mysqli_query($conexion, $sql_insert_detalle);
}

// 5. Automatizar la actualización del costo total en la tabla 'carro_compras'
$sql_total = "UPDATE carro_compras SET compra = (
                SELECT SUM(dc.cantidad * p.precio) 
                FROM detalle_carro dc 
                JOIN productos p ON dc.id_producto = p.id_producto 
                WHERE dc.id_carro = '$id_carro'
              ) WHERE id_carro = '$id_carro'";
mysqli_query($conexion, $sql_total);

// 6. Alerta de éxito y regreso inmediato a la tienda
echo "<script>
        alert('¡Producto añadido al carrito con éxito!');
        window.location.href = 'index.php';
      </script>";

mysqli_close($conexion);
?>