<?php
session_start();
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/User.php';

$pdo = Database::connect();
$userModel = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($code) && !empty($password)) {
        if ($userModel->authenticate($code, $password)) {
            $_SESSION['code'] = $code;
            require_once __DIR__ . '/../views/main.php';
            exit();
        } else {
            $error = "Código o contraseña incorrectos.";
        }
    } else {
        $error = "Todos los campos son obligatorios.";
    }
}

// Cargar la vista de login
require_once __DIR__ . '/../views/login.php';
