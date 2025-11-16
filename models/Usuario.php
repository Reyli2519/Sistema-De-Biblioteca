<?php
// Modelo para usuarios, maneja CRUD y autenticación
class Usuario {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function crear($email, $password, $nombre, $apellido, $rol = 'lector') {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (email, password_hash, nombre, apellido, rol) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$email, $hash, $nombre, $apellido, $rol]);
    }

    public function leerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $email, $nombre, $apellido, $rol) {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET email = ?, nombre = ?, apellido = ?, rol = ? WHERE id_usuario = ?");
        return $stmt->execute([$email, $nombre, $apellido, $rol, $id]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        return $stmt->execute([$id]);
    }

    public function autenticar($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password_hash'])) {
            return $user;
        }
        return false;
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>