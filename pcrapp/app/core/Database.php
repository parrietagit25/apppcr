<?php
class Database {
    private static $host = 'localhost';
    private static $dbname = 'apppcr';
    private static $username = 'root';
    private static $password = 'elchamo1787$$$'; // elchamo1787$$$ Asegúrate de que es la contraseña correcta
    private static $pdo = null;

    public static function connect() {
        $host = 'localhost'; 
        $dbname = 'apppcr'; 
        $username = 'root'; 
        $password = 'elchamo1787$$$'; 
        //$password = ''; 
        
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión a la base de datos: " . $e->getMessage());
        }

        return $pdo;
    }
}
