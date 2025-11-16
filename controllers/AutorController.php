<?php
// Controlador para autores, simple CRUD
class AutorController {
    private $autorModel;

    public function __construct() {
        $this->autorModel = new Autor();
    }

    public function crear($nombre, $apellido, $fecha, $nacionalidad) {
        if (empty($nombre) || empty($apellido)) {
            return "Campos obligatorios.";
        }
        try {
            $this->autorModel->crear($nombre, $apellido, $fecha, $nacionalidad);
            return "Autor creado.";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function listar() {
        return $this->autorModel->listar();
    }
}
?>