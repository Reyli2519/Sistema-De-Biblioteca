<?php
// Modelo para préstamos, con límites y validaciones
class Prestamo {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function crear($id_usuario, $id_libro, $fecha_prestamo) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM prestamos WHERE id_usuario = ? AND estado = 'activo'");
        $stmt->execute([$id_usuario]);
        if ($stmt->fetchColumn() >= 3) {
            throw new Exception("Usuario ya tiene 3 préstamos activos.");
        }
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM prestamos WHERE id_libro = ? AND estado = 'activo'");
        $stmt->execute([$id_libro]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Libro ya prestado.");
        }
        $stmt = $this->pdo->prepare("INSERT INTO prestamos (id_usuario, id_libro, fecha_prestamo) VALUES (?, ?, ?)");
        return $stmt->execute([$id_usuario, $id_libro, $fecha_prestamo]);
    }

    public function devolver($id_prestamo, $fecha_devolucion) {
        $stmt = $this->pdo->prepare("UPDATE prestamos SET fecha_devolucion = ?, estado = 'devuelto' WHERE id_prestamo = ?");
        return $stmt->execute([$fecha_devolucion, $id_prestamo]);
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT p.*, u.nombre as usuario, l.titulo as libro FROM prestamos p JOIN usuarios u ON p.id_usuario = u.id_usuario JOIN libros l ON p.id_libro = l.id_libro");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>