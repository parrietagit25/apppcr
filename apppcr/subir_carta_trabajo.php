<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apppcr";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $solicitud_id = $_POST['solicitud_id'];
    $comentario = isset($_POST['comentario']) ? $conn->real_escape_string($_POST['comentario']) : "";
    $upload_dir = "carta_trabajo/";
    $file_name = $_FILES['archivo']['name'];
    $file_tmp = $_FILES['archivo']['tmp_name'];
    $file_path = $upload_dir . basename($file_name);

   
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    
    if (move_uploaded_file($file_tmp, $file_path)) {
        $sql = "UPDATE carta_trabajo SET file_add = '".$file_path."', stat = 2,id_user_aprobado = '".$_SESSION['code']."'  WHERE id = $solicitud_id";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Archivo subido y guardado correctamente.</div>";
            header('Location: rrhh.php');
        } else {
            echo "<div class='alert alert-danger'>Error al guardar la información en la base de datos: " . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error al subir el archivo.</div>";
    }
}

$conn->close();
?>
