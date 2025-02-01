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
<<<<<<< HEAD
            header('Location: /pcrapp/public/main.php');
=======
            require_once __DIR__ . '/../views/main.php';
>>>>>>> 20e29a6bb86278b5d1c3e9290f1cbe5a8ea94f9a
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
