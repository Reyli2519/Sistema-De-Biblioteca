<?php
// Clase para manejar la conexión a la BD, usando singleton para no crear múltiples instancias
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $host = 'localhost'; // Cambia si es necesario
        $db = 'biblioteca';
        $user = 'root'; // Ajusta según tu setup
        $pass = '';
        $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>