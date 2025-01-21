<?php
session_start(); // Iniciar la sesión

// Configuración de la conexión a la base de datos
$host = 'localhost'; // Cambiar según sea necesario
$dbname = 'apppcr'; // Nombre de tu base de datos
$username = 'root'; // Usuario de la base de datos
$password = 'elchamo1787$$$'; // Contraseña de la base de datos

// Crear la conexión PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'] ?? '';
    $pass = $_POST['password'] ?? '';

    if (!empty($code) && !empty($pass)) {
        // Consulta para validar el código y la contraseña
        $stmt = $pdo->prepare("SELECT * FROM users WHERE code = :code AND pass = :pass AND stat = 1");
        $stmt->bindParam(':code', $code, PDO::PARAM_INT);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->execute();

        // Validar si hay un resultado
        if ($stmt->rowCount() === 1) {
            $_SESSION['code'] = $code; // Guardar el código en la sesión
            header('Location: main.php'); // Redirigir al archivo main.php
            exit();
        } else {
            $error = "Código o contraseña incorrectos.";
        }
    } else {
        $error = "Todos los campos son obligatorios.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0d6efd">
    <title>Login - GrupoPCR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Agregar estilos desde el ejemplo proporcionado */
        body {
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .login-btn {
            background-color: #003366;
            color: white;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
    
<div class="login-container">
<img src="images/logo/1.png" alt="" width="300">
    <!--<h1>GrupoPCR</h1>-->
    <form action="" method="POST">
        <div class="form-group">
            <input type="text" name="code" placeholder="Código de Colaborador" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger mt-2"><?php echo $error; ?></div>
        <?php endif; ?>
        <button type="submit" class="btn login-btn mt-3">Login</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
