<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location:index.php");
    exit();
} elseif ($_SESSION['rol'] == 1) {
    header("Location:admin.php");
    exit();
}

require("conexion.php");

$id = $_GET['id'] ?? null;
$dinero = 0;

if ($id) {
    $sql = "SELECT * FROM dinero WHERE id=$id";
    $ressql = mysqli_query($mysqli, $sql);
    if ($row = mysqli_fetch_row($ressql)) {
        $id = $row[0];
        $dinero = $row[1];
    }
}
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
        .box-style {
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>

<body class="bg-light">
    <main role="main" class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="my-3 p-3 bg-white rounded box-shadow box-style">
                    <div id="home-box">
                        <div class="content text-center">
                            <?php if ($dinero > 0) : ?>
                                <script>alert('Usted sí tiene dinero en su cuenta bancaria')</script>
                                <p class="text-dark">Usted sí tiene dinero en su cuenta bancaria</p>
                                <form action="ejecutaactualizar1.php" method="post">
                                    <div class="form-group">
                                        <label for="id" class="text-dark">ID</label>
                                        <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="dinero" class="text-dark">Dinero actual</label>
                                        <input type="text" class="form-control" name="dinero" value="<?php echo $dinero; ?>" readonly="readonly">
                                    </div>
                                    <br>
                                    <a href="retiro.php?id=<?php echo $id; ?>" class="btn "style="background-color: #f3df00; color: black; border-color: black; width: 100%;">Retirar dinero</a>
                                </form>
                            <?php else : ?>
                                <script>alert('Usted no tiene dinero en su cuenta bancaria')</script>
                                <p class="text-dark">Usted no tiene dinero en su cuenta bancaria</p>
                                <div class="form-group">
                                    <label for="dinero" class="text-dark">Dinero actual</label>
                                    <input type="text" class="form-control" name="dinero" value="<?php echo $dinero; ?>" readonly="readonly">
                                </div>
                                <br>
                                <a href="midinero.php" class="btn "style="background-color: #f3df00; color: black; border-color: black; width: 100%;">Volver</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
