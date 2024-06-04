<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location:index.php");
    exit();
} elseif ($_SESSION['rol'] == 1) {
    header("Location:admin.php");
    exit();
}

// Verifica si hay montos disponibles en la base de datos
require("conexion.php");
$sql = "SELECT * FROM dinero";
$ressql = mysqli_query($mysqli, $sql);
$dinero = mysqli_fetch_assoc($ressql)['dinero'] ?? 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOTE CAJA MONETARIA</title>
    <link rel="icon" type="image/png" href="./imagenes/logo/logo.svg" />
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin: 10px;
            color: white;
        }

        .card-emergencia {
            background-color: #ff4c4c; /* rojo */
        }

        .card-ayuda {
            background-color: #ff9900; /* naranja */
        }

        .card-medico {
            background-color: #ffcc00; /* amarillo */
        }

        .card-moto {
            background-color: #66cc66; /* verde */
        }
        .card-deuda {
            background-color: #4D6EF7; /* verde */
        }

        .card-estudio {
            background-color: #3399ff; /* azul */
        }

        .card-body {
            color: white;
        }
    </style>
</head>

<body class="bg-light">
    

    <main role="main" class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">      
                <div class="my-3 p-3 bg-white rounded box-shadow box-style">
                    <div id="home-box">
                    <div id="home-box">
                    <div class="content"><a href="desconectar.php"><input  class="btn btn-danger" type="submit" name="submit" value="X"/></a>
                        <div class="content">
                            <h1 class="text-uppercase text-center">Hola, <?php echo $_SESSION['user']; ?></h1>
                            <h5 class="text-center">Tu plata hay</h5>
                            <div class="card text-dark mb-3">
                                <div class="card-body">
                                    <h5 class="card-title text-muted">Disponible</h5>
                                    <p class="card-text text-muted">Monto: <?php echo $dinero; ?></p>
                                    <hr>
                                    <p class="card-subtitle mb-2 text-muted">Total: <?php echo $dinero; ?></p>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-around">
                                <?php
                                // Ejemplo de tarjetas con diferentes depósitos
                                $depositos = [
                                    ['id' => 1, 'tipo' => 'Emergencias', 'clase' => 'card-emergencia', 'monto' => $dinero],
                                    ['id' => 2, 'tipo' => 'Ahorro ', 'clase' => 'card-ayuda', 'monto' => $dinero],
                                    ['id' => 3, 'tipo' => 'Hogar', 'clase' => 'card-medico', 'monto' => $dinero],
                                    ['id' => 4, 'tipo' => 'Familia', 'clase' => 'card-moto', 'monto' => $dinero],
                                    ['id' => 4, 'tipo' => 'Deudas', 'clase' => 'card-deuda', 'monto' => $dinero],
                                ];
                                foreach ($depositos as $deposito) :
                                ?>
                                    <div class="card <?php echo $deposito['clase']; ?>">
                                        <div class="card-body">
                                            <h5 class="card-title">Depósito <?php echo $deposito['tipo']; ?></h5>
                                            <p class="card-text">Monto: $<?php echo $deposito['monto']; ?></p>
                                            <a href="sacardinero.php?id=<?php echo $deposito['id']; ?>" class="btn btn-light">Retirar</a>
                                            <a href="#" class="btn btn-light">Depositar</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <br>
                            <?php
                            if ($dinero < 0) {
                                echo "<center><font color='D10404' size='5'>Usted debe dinero, debe pagar lo que debe o su cuenta se cancelará en las próximas 24 horas</font></center>";
                            } else {
                                echo "<center><font color='black' size='5'>La cuenta está muy bien</font></center>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>