<?php
session_start();
if (!isset($_SESSION['code'])) {
    header("Location: salir.php");
    exit();
}

$host = 'localhost';
$dbname = 'apppcr';
$username = 'root';
$password = 'elchamo1787$$$';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}

// Obtener datos del empleado
$code = $_SESSION['code'];
$stmt = $pdo->prepare("SELECT * FROM col_datos_generales_completos WHERE codigo_empleado = :code");
$stmt->bindParam(':code', $code, PDO::PARAM_INT);
$stmt->execute();
$list_code = $stmt->fetch(PDO::FETCH_ASSOC);

// Datos del empleado
$codigo_empleado = $list_code['codigo_empleado'] ?? '';
$nombre = $list_code['nombre'] ?? '';
$apellido = $list_code['apellido'] ?? '';
$departamento = 'TECNOLOGÍA'; // Ajusta esto si el dato está en la BD
$sangre = 'O+'; // Puedes obtenerlo de la BD si está disponible
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0d6efd">
    <title>APP PCR</title>
    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="manifest" href="manifest.json">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 20px;
        }
        .carnet {
            width: 300px;
            border: 2px solid #333;
            border-radius: 10px;
            background: #fff;
            text-align: center;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
        }
        .carnet img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .carnet h3 {
            margin: 0;
            font-size: 1.2em;
            color: #333;
        }
        .carnet p {
            margin: 5px 0;
            font-size: 0.9em;
            color: #555;
        }
        .carnet .footer {
            margin-top: 20px;
            font-size: 0.8em;
            color: #777;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PCR App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="main.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <div class="carnet">
        <h1>GRUPO <b>PCR</b></h1>
        <img src="images/user.png" alt="Foto del empleado">
        <h3><?php echo $nombre . ' ' . $apellido; ?></h3>
        <p><b>Código:</b> <?php echo $codigo_empleado; ?></p>
        <p><b>Departamento:</b> <?php echo $departamento; ?></p>
        <p><b>Sangre:</b> <?php echo $sangre; ?></p>
        <p><b>No.:</b> 2374</p>
        <div class="footer">
            <p>Grupo PCR</p>
            <p>Líderes Movilizando Panamá</p>
        </div>
    </div>
    <!-- Footer navigation -->
    <nav class="navbar fixed-bottom navbar-light bg-light border-top">
        <div class="container-fluid">
            <a href="main.php" class="navbar-brand text-center" style="width: 25%;">INICIO</a>
            <a href="#" class="navbar-brand text-center" style="width: 25%;"></a>
            <a href="main.php" class="navbar-brand text-center" style="width: 25%;">VOLVER</a>
            <a href="#" class="navbar-brand text-center" style="width: 25%;"></a>
        </div>
    </nav>

<?php include 'templates/footer.php'; ?>
