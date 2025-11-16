<?php
// Modelo para libros, con join para mostrar autores
class Libro {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function crear($titulo, $isbn, $anio_publicacion, $id_autor) {
        $stmt = $this->pdo->prepare("INSERT INTO libros (titulo, isbn, anio_publicacion, id_autor) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$titulo, $isbn, $anio_publicacion, $id_autor]);
    }

    public function leerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM libros WHERE id_libro = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $titulo, $isbn, $anio_publicacion, $id_autor) {
        $stmt = $this->pdo->prepare("UPDATE libros SET titulo = ?, isbn = ?, anio_publicacion = ?, id_autor = ? WHERE id_libro = ?");
        return $stmt->execute([$titulo, $isbn, $anio_publicacion, $id_autor, $id]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM libros WHERE id_libro = ?");
        return $stmt->execute([$id]);
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT l.*, a.nombre, a.apellido FROM libros l LEFT JOIN autores a ON l.id_autor = a.id_autor");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>