<?php
// Modelo para autores, con validación para no eliminar si tienen libros
class Autor {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function crear($nombre, $apellido, $fecha_nacimiento, $nacionalidad) {
        $stmt = $this->pdo->prepare("INSERT INTO autores (nombre, apellido, fecha_nacimiento, nacionalidad) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nombre, $apellido, $fecha_nacimiento, $nacionalidad]);
    }

    public function leerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM autores WHERE id_autor = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $apellido, $fecha_nacimiento, $nacionalidad) {
        $stmt = $this->pdo->prepare("UPDATE autores SET nombre = ?, apellido = ?, fecha_nacimiento = ?, nacionalidad = ? WHERE id_autor = ?");
        return $stmt->execute([$nombre, $apellido, $fecha_nacimiento, $nacionalidad, $id]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM libros WHERE id_autor = ?");
        $stmt->execute([$id]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("No se puede eliminar autor con libros asociados.");
        }
        $stmt = $this->pdo->prepare("DELETE FROM autores WHERE id_autor = ?");
        return $stmt->execute([$id]);
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM autores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>