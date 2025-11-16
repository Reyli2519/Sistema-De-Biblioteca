<?php
// Controlador para libros, maneja creación y listado
class LibroController {
    private $libroModel;
    private $autorModel;

    public function __construct() {
        $this->libroModel = new Libro();
        $this->autorModel = new Autor();
    }

    public function crear($titulo, $isbn, $anio, $id_autor) {
        if (empty($titulo) || empty($isbn) || empty($id_autor)) {
            return "Campos obligatorios.";
        }
        if (!preg_match('/^\d{10}(\d{3})?$/', $isbn)) {
            return "ISBN inválido (10 o 13 dígitos).";
        }
        try {
            $this->libroModel->crear($titulo, $isbn, $anio, $id_autor);
            return "Libro creado.";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function listar() {
        return $this->libroModel->listar();
    }
}
?>