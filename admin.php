<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
} elseif ($_SESSION['rol'] == 2) {
    header("Location: index2.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSP</title>
    <link rel="icon" type="image/png" href="./imagenes/logo/logo.svg" />
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
</head>

<body>
    <main class="container">
        <div class="row my-3">
            <div class="col-12">
                <div class="bg-white rounded p-3">
                    <div class="text-center">
                        <?php
                        // Incluir el archivo de conexión a la base de datos
                        require("bancoconexion.php");

                        // Consulta para obtener datos de cuentas
                        $sqlCuentas = "SELECT * FROM cuentas";
                        $queryCuentas = mysqli_query($mysqli, $sqlCuentas);

                        // Mostrar tabla de cuentas
                        echo "<table class='table table-striped table-bordered'>";
                        echo "<thead class='thead-dark'>";
                        echo "<tr>";
                        echo "<th>Id</th>";
                        echo "<th>Nombre</th>";
                        echo "<th>Contraseña</th>";
                        echo "<th>Correo</th>";
                        echo "<th>T.documento</th>";
                        echo "<th>Documento</th>";
                        echo "<th>Contraseña admin</th>";
                        echo "<th>Rol</th>";
                        echo "<th>Editar</th>";
                        echo "<th>Borrar</th>";
                        echo "</tr>";
                        echo "</thead><tbody>";

                        // Mostrar datos de cuentas en la tabla
                        while ($arregloCuentas = mysqli_fetch_array($queryCuentas)) {
                            echo "<tr>";
                            echo "<td>{$arregloCuentas[0]}</td>";
                            echo "<td>{$arregloCuentas[1]}</td>";
                            echo "<td>{$arregloCuentas[2]}</td>";
                            echo "<td>{$arregloCuentas[3]}</td>";
                            echo "<td>{$arregloCuentas[4]}</td>";
                            echo "<td>{$arregloCuentas[5]}</td>";
                            echo "<td>{$arregloCuentas[6]}</td>";
                            echo "<td>{$arregloCuentas[7]}</td>";
                            echo "<td><a href='actualizarcuenta.php?id={$arregloCuentas[0]}' class='btn btn-primary'>🖉 Editar</a></td>";
                            echo "<td><a href='banvirtualadmin.php?id={$arregloCuentas[0]}&idborrar=2' class='btn btn-danger'>⌦ Borrar</a></td>";
                            echo "</tr>";
                        }

                        echo "</tbody></table>";

                        // Proceso de borrado de cuenta
                        if (isset($_GET['idborrar']) && $_GET['idborrar'] == 2) {
                            $id = $_GET['id'];
                            $sqlborrar = "DELETE FROM cuentas WHERE id=$id";
                            $resborrar = mysqli_query($mysqli, $sqlborrar);
                            echo '<script>alert(" HA ELIMINADO A ESTE USUARIO")</script>';
                            echo "<script>location.href='banvirtualadmin.php'</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-12">
                <div class="bg-white rounded p-3">
                    <div class="text-center">
                        <?php
                        // Consulta para obtener datos de dinero
                        $sqlDinero = "SELECT * FROM dinero";
                        $queryDinero = mysqli_query($mysqli, $sqlDinero);

                        // Mostrar tabla de dinero
                        echo "<table class='table table-striped table-bordered'>";
                        echo "<thead class='thead-dark'>";
                        echo "<tr>";
                        echo "<th>Id</th>";
                        echo "<th>Dinero</th>";
                        echo "<th>Editar</th>";
                        echo "<th>Borrar</th>";
                        echo "</tr>";
                        echo "</thead><tbody>";

                        // Mostrar datos de dinero en la tabla
                        while ($arregloDinero = mysqli_fetch_array($queryDinero)) {
                            echo "<tr>";
                            echo "<td>{$arregloDinero[0]}</td>";
                            echo "<td>{$arregloDinero[1]}</td>";
                            echo "<td><a href='actualizardinero.php?id={$arregloDinero[0]}' class='btn btn-primary'>🖉 Editar</a></td>";
                            echo "<td><a href='banvirtualadmin.php?id={$arregloDinero[0]}&idborrar=2' class='btn btn-danger'>⌦ Borrar</a></td>";
                            echo "</tr>";
                        }

                        echo "</tbody></table>";

                        // Proceso de borrado de dinero
                        if (isset($_GET['idborrar']) && $_GET['idborrar'] == 2) {
                            $id = $_GET['id'];
                            $sqlborrar = "DELETE FROM dinero WHERE id=$id";
                            $resborrar = mysqli_query($mysqli, $sqlborrar);
                            echo '<script>alert("HA ELIMINADO A ESTE USUARIO")</script>';
                            echo "<script>location.href='banvirtualadmin.php'</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center my-3">
            <a href="desconectar.php" class="btn btn-danger">Salir</a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min
