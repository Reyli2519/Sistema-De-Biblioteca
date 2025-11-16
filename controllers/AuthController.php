<?php
// Controlador para autenticación: login, registro, logout
class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function login($email, $password) {
        if (empty($email) || empty($password)) {
            return "Campos obligatorios.";
        }
        $user = $this->usuarioModel->autenticar($email, $password);
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header("Location: index.php?action=dashboard");
            exit;
        } else {
            return "Credenciales inválidas.";
        }
    }

    public function register($email, $password, $nombre, $apellido) {
        if (empty($email) || empty($password) || empty($nombre) || empty($apellido)) {
            return "Todos los campos son obligatorios.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Email inválido.";
        }
        if (strlen($password) < 6) {
            return "Contraseña debe tener al menos 6 caracteres.";
        }
        try {
            $this->usuarioModel->crear($email, $password, $nombre, $apellido);
            return "Registro exitoso. Inicia sesión.";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
?>