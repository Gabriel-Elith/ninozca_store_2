<?php
// quitar_item.php
session_start();
include 'conexion.php';

// 1. Validar que el usuario haya iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: loginframework.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = $_SESSION['usuario'];
    $id_producto = $_POST['id_producto'];

    // 2. Obtener el id_cliente del usuario conectado
    $sql_cliente = "SELECT id_cliente FROM cliente_usuario 
                    WHERE id_usuario = (SELECT id_usuario FROM usuarios WHERE nombre_usuario = '$nombre_usuario') 
                    AND estado = 'Activo' LIMIT 1";
    $res_cliente = mysqli_query($conexion, $sql_cliente);
    $row_cliente = mysqli_fetch_assoc($res_cliente);
    $id_cliente = $row_cliente['id_cliente'];

    // 3. Obtener el id_carro de este cliente
    $sql_carro = "SELECT id_carro FROM carro_compras WHERE id_cliente = '$id_cliente' LIMIT 1";
    $res_carro = mysqli_query($conexion, $sql_carro);
    $row_carro = mysqli_fetch_assoc($res_carro);
    $id_carro = $row_carro['id_carro'];

    // 4. Eliminar el producto de la tabla 'detalle_carro'
    $sql_eliminar = "DELETE FROM detalle_carro WHERE id_carro = '$id_carro' AND id_producto = '$id_producto'";
    
    if (mysqli_query($conexion, $sql_eliminar)) {
        // 5. Actualizar el precio total acumulado en 'carro_compras' tras el borrado
        $sql_total = "UPDATE carro_compras SET compra = (
                        SELECT COALESCE(SUM(dc.cantidad * p.precio), 0.00) 
                        FROM detalle_carro dc 
                        JOIN productos p ON dc.id_producto = p.id_producto 
                        WHERE dc.id_carro = '$id_carro'
                      ) WHERE id_carro = '$id_carro'";
        mysqli_query($conexion, $sql_total);

        // Regresar limpiamente al carrito
        header("Location: ver_carrito.php");
        exit();
    } else {
        echo "Error al quitar el producto del carrito: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
