<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:index.php");
    exit();
} elseif ($_SESSION['rol'] == 1) {
    header("Location:admin.php");
    exit();
}

// Inicializamos la variable $dinero para evitar la advertencia de variable no definida
$dinero = 0;

// Aquí obtienes el valor de $dinero de la base de datos
require("conexion.php");

$sql = "SELECT * FROM dinero ";
$ressql = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_row($ressql)) {
    $id = $row[0];
    $dinero = $row[1];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOTE CAJA MONETARIA</title>
    <link rel="icon" type="image/png" href="./imagenes/logo/logo.svg" />

    <link href="./static/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-link img {
            display: block;
            margin: auto;
        }
    </style>
</head>

<body style="background-image: url('./imagenes/fondo/Fondo.jpg'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat;   ">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f3df00; color: black; border-color: black; width: 100%;">
        <div class="collapse navbar-collapse justify-content-center align-items-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="./imagenes/menu/bell.svg" alt="Campana" width="30" height="30"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="./imagenes/menu/help.svg" alt="Ayuda" width="30" height="30"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="./imagenes/menu/account.svg" alt="Cuenta" width="30" height="30"></a>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main" class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="my-3 p-3 bg-white rounded box-shadow box-style">
                    <div id="home-box" class="p-3">
                        <div class="content">
                            <h1 class="text-uppercase text-center">Hola, <?php echo $_SESSION['user']; ?></h1>
                            <div class="text-center mt-3">
                                <form method="post" action="dinerovalidar.php">
                                    <div class="form-group">
                                        <input type="number" name="dinero" class="form-control" placeholder="Ingrese la cantidad de dinero" min="0" max="500000" required="" />
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <select class="form-control" name="tdocumento" required="">
                                            <option selected>Tipo de depósito</option>
                                            <option value="cedula de ciudadania">Emergencia</option>
                                            <option value="cedula extranjera">Ahorro independientes</option>
                                            <option value="Numero unico de identificación personal">Hogar</option>
                                            <option value="Numero unico de identificación personal">Familia</option>
                                            <option value="Numero unico de identificación personal">Deudas</option>
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <input class="btn px-5 my-3" style="background-color: #f3df00; color: black; border-color: black; width: 100%;" type="submit" name="submit" value="Ingresar cantidad" />
                                    </div>
                                </form>
                            </div>
                            <div class="text-center mt-5">
                                <?php if ($dinero > 1) { ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Disponible</h5>
                                            <p class="card-text">Monto: <?php echo $dinero; ?></p>
                                            <hr>
                                            <p class="card-subtitle mb-2 text-muted">Total: <?php echo $dinero; ?></p>
                                        </div>
                                    </div>
                                    <br>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
