<?php
// Controlador para préstamos, con validaciones
class PrestamoController {
    private $prestamoModel;

    public function __construct() {
        $this->prestamoModel = new Prestamo();
    }

    public function crear($id_usuario, $id_libro, $fecha) {
        if (empty($id_usuario) || empty($id_libro) || empty($fecha)) {
            return "Campos obligatorios.";
        }
        try {
            $this->prestamoModel->crear($id_usuario, $id_libro, $fecha);
            return "Préstamo creado.";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function listar() {
        return $this->prestamoModel->listar();
    }
}
?>