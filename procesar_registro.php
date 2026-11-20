<?php
// Activamos la depuración de errores por si acaso
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conexion.php';

// 1. Recibimos los datos exactos que coinciden con tu tabla clientes
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$identificacion = $_POST['identificacion'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$correo = $_POST['correo'];

$usuario = $_POST['usuario_reg'];
$password = $_POST['password_reg'];

// 2. Insertamos en la tabla 'clientes' sin campos sobrantes
$sql_cliente = "INSERT INTO clientes (nombre, apellidos, direccion, ciudad, identificacion, correo) 
                VALUES ('$nombre', '$apellidos', '$direccion', '$ciudad', '$identificacion', '$correo')";

if (mysqli_query($conexion, $sql_cliente)) {
    // Capturamos el id_cliente autogenerado
    $id_cliente = mysqli_insert_id($conexion);
    
    // 3. Guardamos el acceso en la tabla 'usuarios'
    $sql_usuario = "INSERT INTO usuarios (nombre_usuario, contrasena) 
                    VALUES ('$usuario', '$password')";
                    
    if (mysqli_query($conexion, $sql_usuario)) {
        // Capturamos el id_usuario autogenerado
        $id_usuario = mysqli_insert_id($conexion);
        
        // 4. Amarramos ambas tablas en tu tabla intermedia 'cliente_usuario'
        $sql_intermedia = "INSERT INTO cliente_usuario (id_cliente, id_usuario, estado) 
                           VALUES ('$id_cliente', '$id_usuario', 'Activo')";
                           
        if (mysqli_query($conexion, $sql_intermedia)) {
            echo "<div style='text-align:center; margin-top:50px; font-family:sans-serif;'>";
            echo "<h2 style='color: #198754;'>¡Registro completo en Ninozca Store!</h2>";
            echo "<p>Tu cuenta y datos personales se han guardado con éxito. Redirigiendo...</p>";
            echo "</div>";
            header("refresh:3; url=loginframework.php");
        } else {
            echo "Error en tabla intermedia: " . mysqli_error($conexion);
        }
    } else {
        echo "Error en tabla usuarios: " . mysqli_error($conexion);
    }
} else {
    echo "<script>
            alert('Error al registrar: La identificación o el correo ya se encuentran registrados.');
            window.location.href = 'registroframework.php';
          </script>";
}

mysqli_close($conexion);
?>