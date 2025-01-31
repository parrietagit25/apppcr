<?php
session_start();
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/User.php';

$pdo = Database::connect();
$userModel = new User($pdo);

if (!isset($_SESSION['code'])) {
    header("Location: salir.php");
    exit();
}

$code = $_SESSION['code'];
$stmt = $pdo->prepare("SELECT nombre FROM col_vacaciones WHERE codigo = :code");
$stmt->bindParam(':code', $code, PDO::PARAM_INT);
$stmt->execute();

$nombre = "";
if ($list_code = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $nombre = $list_code['nombre'];
}

// Cargar la vista
require_once __DIR__ . '/../views/main.php';
