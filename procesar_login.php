<?php
// procesar_login.php
session_start();
include 'conexion.php';

$usuario = $_POST['usuario_login'];
$password = $_POST['password_login'];

// 1. Buscamos si las credenciales existen en la tabla usuarios
$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND contrasena = '$password'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $row_usuario = mysqli_fetch_assoc($resultado);
    $id_usuario = $row_usuario['id_usuario'];

    // Guardamos el nombre en la sesión
    $_SESSION['usuario'] = $usuario;

    // 2. LA CLAVE: Verificamos si este ID también es un Administrador
    $sql_check_admin = "SELECT * FROM administradores WHERE id_admin = '$id_usuario'";
    $res_check_admin = mysqli_query($conexion, $sql_check_admin);

    if (mysqli_num_rows($res_check_admin) > 0) {
        // ¡Es un administrador! Le asignamos su rol exclusivo
        $_SESSION['rol'] = 'admin';
        
        echo "<div style='text-align:center; margin-top:50px; font-family:sans-serif;'>";
        echo "<h2 style='color: #198754;'>¡Panel de Administración Detectado!</h2>";
        echo "<p>Bienvenido al sistema interno de Ninozca Store...</p>";
        echo "</div>";
        // Lo mandamos directo a su panel de control de productos
        header("refresh:2; url=admin_productos.php");
    } else {
        // Es un cliente común
        $_SESSION['rol'] = 'cliente';
        
        echo "<div style='text-align:center; margin-top:50px; font-family:sans-serif;'>";
        echo "<h2 style='color: #0d6efd;'>¡Bienvenido a Ninozca Store!</h2>";
        echo "<p>Cargando vitrina de productos...</p>";
        echo "</div>";
        header("refresh:2; url=index.php");
    }
} else {
    echo "<script>
            alert('Usuario o contraseña incorrectos. Inténtalo de nuevo.');
            window.location.href = 'loginframework.php';
          </script>";
}

mysqli_close($conexion);
?>

