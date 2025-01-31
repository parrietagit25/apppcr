<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function authenticate($code, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE code = :code AND pass = :pass AND stat = 1");
        $stmt->bindParam(':code', $code, PDO::PARAM_INT);
        $stmt->bindParam(':pass', $password, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount() === 1;
    }
}
