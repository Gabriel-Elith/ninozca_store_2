<?php
// ver_carrito.php
session_start();
include 'conexion.php';

// 1. Validar que el usuario haya iniciado sesión para ver sus datos
if (!isset($_SESSION['usuario'])) {
    echo "<script>
            alert('Debes iniciar sesión para acceder a tu carrito.');
            window.location.href = 'loginframework.php';
          </script>";
    exit();
}

$nombre_usuario = $_SESSION['usuario'];

// 2. Obtener el id_cliente del usuario conectado mediante tu tabla intermedia
$sql_cliente = "SELECT id_cliente FROM cliente_usuario 
                WHERE id_usuario = (SELECT id_usuario FROM usuarios WHERE nombre_usuario = '$nombre_usuario') 
                AND estado = 'Activo' LIMIT 1";
$res_cliente = mysqli_query($conexion, $sql_cliente);
$row_cliente = mysqli_fetch_assoc($res_cliente);

if (!$row_cliente) {
    die("Error: No se encontró un perfil de cliente para este usuario.");
}
$id_cliente = $row_cliente['id_cliente'];

// 3. Consultar las filas dinámicas uniendo las tablas detalle_carro y productos
$sql_carrito = "SELECT p.id_producto, p.descripcion, p.talla, p.precio, dc.cantidad, (dc.cantidad * p.precio) AS subtotal
                FROM detalle_carro dc
                JOIN carro_compras cc ON dc.id_carro = cc.id_carro
                JOIN productos p ON dc.id_producto = p.id_producto
                WHERE cc.id_cliente = '$id_cliente'";
$resultado_carro = mysqli_query($conexion, $sql_carrito);
$total_articulos = mysqli_num_rows($resultado_carro);
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi carrito - Ninozca Store</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="carrito.css">
</head>

<body>

    <!-- Barra superior -->
    <header class="barra-superior">
        <!-- Corregido enlace a index.php -->
        <a href="index.php" class="logo">
            Ninozca <span>Store</span>
        </a>

        <a href="index.php" class="volver">
            <i class="bi bi-arrow-left"></i> Seguir comprando
        </a>
    </header>

    <main class="contenedor">

        <div class="titulo">
            <h1>Mi carrito de compras</h1>
            <p>Revisa los productos que has seleccionado.</p>
        </div>

        <div class="row g-4">

            <!-- Productos -->
            <div class="col-lg-8">
                <div class="productos">
                    <div class="encabezado-productos">
                        <h4>Productos seleccionados</h4>
                        <!-- Contador dinámico de artículos -->
                        <span><?php echo $total_articulos; ?> artículo(s)</span>
                    </div>

                    <?php
                    $total_general = 0;
                    if ($total_articulos > 0) {
                        while ($item = mysqli_fetch_assoc($resultado_carro)) {
                            $total_general += $item['subtotal'];
                            ?>
                            <!-- Producto Dinámico -->
                            <div class="producto">
                                <div class="info-producto">
                                    <!-- Trae la información real de tu base de datos -->
                                    <h5><?php echo $item['descripcion']; ?></h5>
                                    <p>Talla: <?php echo $item['talla']; ?></p>
                                    <strong>$<?php echo number_format($item['precio'], 0, ',', '.'); ?></strong>
                                </div>

                                <div class="cantidad">
                                    <span>Cant: <?php echo $item['cantidad']; ?></span>
                                </div>

                                <div class="subtotal">
                                    <strong>$<?php echo number_format($item['subtotal'], 0, ',', '.'); ?></strong>
                                    <!-- Botón para limpiar este artículo del carro si se desea -->
                                    <form action="quitar_item.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="id_producto" value="<?php echo $item['id_producto']; ?>">
                                        <button type="submit" class="eliminar" style="border:none; background:none;">
                                            <i class="bi bi-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<div class='text-center p-4'><p class='text-muted'>Tu carrito está vacío de momento.</p></div>";
                    }
                    ?>

                    <a href="index.php" class="seguir">
                        <i class="bi bi-arrow-left"></i> Seguir explorando productos
                    </a>
                </div>
            </div>

            <!-- Resumen de compra Dinámico -->
            <div class="col-lg-4">
                <div class="resumen">
                    <h4>Resumen de compra</h4>

                    <div class="detalle">
                        <span>Subtotal</span>
                        <span>$<?php echo number_format($total_general, 0, ',', '.'); ?></span>
                    </div>

                    <div class="detalle">
                        <span>Envío</span>
                        <span>Gratis</span>
                    </div>

                    <hr>

                    <div class="total">
                        <span>Total</span>
                        <strong>$<?php echo number_format($total_general, 0, ',', '.'); ?></strong>
                    </div>

                    <?php if ($total_general > 0): ?>
                        <!-- Formulario para mandar la orden a la tabla pedidos al pagar -->
                        <form action="procesar_compra.php" method="POST">
                            <button type="submit" class="btn-comprar w-100">
                                Continuar con la compra <i class="bi bi-arrow-right"></i>
                            </button>
                        </form>
                    <?php endif; ?>

                    <div class="seguridad">
                        <i class="bi bi-shield-check"></i> Compra segura y confiable
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer>
        © 2026 Ninozca Store - Todos los derechos reservados.
    </footer>

</body>
</html>
<?php mysqli_close($conexion); ?>
