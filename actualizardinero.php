<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
} elseif ($_SESSION['rol'] == 2) {
    header("Location: index2.php");
    exit();
}

// Verificar si $id está definido
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // Manejar el caso cuando $id no está definido
    echo "Error: ID no proporcionado.";
    exit();
}

// Incluir el archivo de conexión a la base de datos
require("bancoconexion.php");

// Utilizar consultas preparadas para prevenir la inyección SQL
$sql = "SELECT * FROM dinero WHERE id=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron resultados
if ($result->num_rows === 0) {
    // Manejar el caso cuando no se encuentra el registro correspondiente al ID dado
    echo "Error: No se encontró ningún registro para el ID proporcionado.";
    exit();
}

// Obtener los datos del registro
$row = $result->fetch_assoc();
$id = $row['id'];
$dinero = $row['dinero'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOTE CAJA MONETARIA</title>
    <link rel="icon" type="image/png" href="./imagenes/logo/logo.svg">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <style>
        .custom-btn {
            background-color: #f3df00;
            color: black;
            border-color: black;
            width: 100%;
        }
    </style>
</head>

<body>
    <main class="container">
        <div class="row my-3">
            <div class="col-12">
                <div class="bg-white rounded p-3">
                    <div class="text-center">
                        <form action="ejecutadinero.php" method="post">
                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id ?>" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="dinero">Dinero</label>
                                <input type="number" class="form-control" id="dinero" name="dinero" value="<?php echo $dinero ?>">
                            </div>
                            <div class="text-center my-3">
                                <input type="submit" value="🖉 Modificar" class="btn btn-warning custom-btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 text-center">
                <a href="desconectar.php" class="btn btn-danger">Salir</a>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


