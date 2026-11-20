
<?php
// LÍNEA 1: Esto debe ser lo primero que lea el servidor
session_start();

// Si no existe la sesión del rol o el rol no es de administrador, se expulsa
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    echo "<script>
            alert('Acceso denegado. Esta zona es exclusiva para el Administrador de la tienda.');
            window.location.href = 'loginframework.php';
          </script>";
    exit(); // Detiene por completo la carga del HTML de abajo
}
?>
  <!doctype html>
  <html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin | Agregar Productos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS propio -->
    <link rel="stylesheet" href="admin_productos.css">
</head>

<body>

    <div class="container mt-5">
        <div class="card producto-card shadow-sm">
            
            <div class="icono-admin">
                <i class="bi bi-box-seam"></i>
            </div>

            <h2 class="text-center mb-2">Agregar Nuevo Producto</h2>
            <p class="descripcion text-center">
                Completa los datos para registrar un producto en Ninozca Store.
            </p>

            <form action="procesar_agregar_producto.php" method="POST">

                <div class="mb-3">
                    <label class="form-label">Descripción / Nombre del Producto</label>
                    <input type="text" name="descripcion" class="form-control"
                           placeholder="Ej: Camisa casual" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio ($)</label>
                    <input type="number" name="precio" class="form-control"
                           placeholder="Ej: 45000" min="0" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Talla</label>
                    <input type="text" name="talla" class="form-control"
                           placeholder="Ej: S, M, L, Oversize">
                </div>

                <button type="submit" class="btn btn-guardar w-100">
                    <i class="bi bi-plus-circle me-2"></i>
                    Guardar Producto
                </button>

                <a href="index.php" class="btn btn-volver w-100 mt-2">
                    <i class="bi bi-arrow-left me-2"></i>
                    Ir a la Tienda
                </a>

            </form>
        </div>
    </div>

    <!-- Copia esto al final del contenedor principal en admin_productos.php -->
  <div class="card shadow-sm p-4 mt-4">
    <h3 class="text-center mb-3">Productos Existentes</h3>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Talla</th>
                    <th>Precio</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conexion.php';
                $sql_lista = "SELECT * FROM productos";
                $res_lista = mysqli_query($conexion, $sql_lista);

                if (mysqli_num_rows($res_lista) > 0) {
                    while ($prod = mysqli_fetch_assoc($res_lista)) {
                        ?>
                        <tr>
                            <td><?php echo $prod['id_producto']; ?></td>
                            <td><?php echo $prod['descripcion']; ?></td>
                            <td><?php echo $prod['talla']; ?></td>
                            <td>$<?php echo number_format($prod['precio'], 0, ',', '.'); ?></td>
                            <td>
                                <!-- Asegúrate de que apunte directamente a eliminar_producto.php -->
                                <form action="eliminar_producto.php" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                    <input type="hidden" name="id_producto" value="<?php echo $prod['id_producto']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center text-muted'>No hay productos registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>

