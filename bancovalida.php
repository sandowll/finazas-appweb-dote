<?php
session_start();
require("bancoconexion.php");

// Habilitar la visualización de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $usuario = $_POST['mail'];
    $pass = $_POST['pass'];

    // Verifica que los datos no estén vacíos
    if (empty($usuario) || empty($pass)) {
        echo '<script>alert("Por favor, complete todos los campos.")</script>';
        echo "<script>location.href='index.php'</script>";
        exit();
    }

    // Consulta para comprobar si el usuario es administrador
    $sql2 = $mysqli->prepare("SELECT * FROM cuentas WHERE email=?");
    $sql2->bind_param("s", $usuario);
    $sql2->execute();
    $result2 = $sql2->get_result();

    if ($result2->num_rows > 0) {
        $f2 = $result2->fetch_assoc();
        if ($pass === $f2['pasadmin']) {
            $_SESSION['id'] = $f2['id'];
            $_SESSION['user'] = $f2['user'];
            $_SESSION['rol'] = $f2['rol'];

            echo '<script>alert("BIENVENIDO A BANCOLOMBIA ADMINISTRADOR")</script>';
            echo "<script>location.href='admin.php'</script>";
            exit();
        }
    }

    // Consulta para comprobar si el usuario es un usuario normal
    $sql = $mysqli->prepare("SELECT * FROM cuentas WHERE email=?");
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $f = $result->fetch_assoc();
        if ($pass === $f['password']) {
            $_SESSION['id'] = $f['id'];
            $_SESSION['user'] = $f['user'];
            $_SESSION['rol'] = $f['rol'];

            echo '<script>alert("BIENVENIDO A BANCOLOMBIA")</script>';
            echo "<script>location.href='inicio.php'</script>";
            exit();
        } else {
            echo '<script>alert("CONTRASEÑA INCORRECTA")</script>';
            echo "<script>location.href='index.php'</script>";
            exit();
        }
    } else {
        echo '<script>alert("ESTE USUARIO NO EXISTE, POR FAVOR REGÍSTRESE PARA PODER INGRESAR")</script>';
        echo "<script>location.href='index.php'</script>";
        exit();
    }
} else {
    echo '<script>alert("Método de solicitud no válido.")</script>';
    echo "<script>location.href='index.php'</script>";
}
?>
