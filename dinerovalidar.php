<?php
// Recoger el valor de dinero desde el formulario
$dinero = $_POST['dinero'];

// Requerir el archivo de conexión a la base de datos
require("conexion.php");

// Verificar si el monto de la transferencia es menor o igual a 100.000
if ($dinero <= 100000) {
    // Insertar el valor de la transferencia en la tabla dinero
    mysqli_query($mysqli, "INSERT INTO dinero (dinero) VALUES ('$dinero')");

    // Redirigir al usuario y mostrar mensaje de transferencia exitosa
    echo '<script language="javascript">alert("TRANSFERENCIA BANCARIA CORRECTAMENTE");</script>';
    echo "<script>location.href='midinero.php'</script>";
} else {
    // Si el monto es mayor a 100.000, mostrar un mensaje de error y redirigir al usuario
    echo '<script language="javascript">alert("SU MONTO ES MAYOR A 500.000 HAY UN ERROR EN SU TRANSFERENCIA BANCARIA");</script>';
    echo "<script>location.href='inicio.php'</script>";
}
?>