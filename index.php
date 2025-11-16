<?php
// Punto de entrada del sistema de biblioteca
// Incluimos los archivos necesarios
require_once 'config/Database.php';
require_once 'models/Usuario.php';
require_once 'models/Autor.php';
require_once 'models/Libro.php';
require_once 'models/Prestamo.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/LibroController.php';
require_once 'controllers/AutorController.php';
require_once 'controllers/PrestamoController.php';

session_start();

$action = $_GET['action'] ?? 'login';
$error = '';
$mensaje = '';

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $auth = new AuthController();
            $error = $auth->login($_POST['email'], $_POST['password']);
        }
        include 'views/login.php';
        break;

    case 'register':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $auth = new AuthController();
            $error = $auth->register($_POST['email'], $_POST['password'], $_POST['nombre'], $_POST['apellido']);
        }
        include 'views/register.php';
        break;

    case 'logout':
        $auth = new AuthController();
        $auth->logout();
        break;

    case 'dashboard':
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }
        include 'views/dashboard.php';
        break;

    case 'libros':
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }
        $libroCtrl = new LibroController();
        $autorCtrl = new AutorController();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mensaje = $libroCtrl->crear($_POST['titulo'], $_POST['isbn'], $_POST['anio'], $_POST['id_autor']);
        }
        $libros = $libroCtrl->listar();
        $autores = $autorCtrl->listar();
        include 'views/libros.php';
        break;

    case 'autores':
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }
        $autorCtrl = new AutorController();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mensaje = $autorCtrl->crear($_POST['nombre'], $_POST['apellido'], $_POST['fecha'], $_POST['nacionalidad']);
        }
        $autores = $autorCtrl->listar();
        include 'views/autores.php';
        break;

    case 'prestamos':
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }
        $prestamoCtrl = new PrestamoController();
        $usuarioModel = new Usuario();
        $libroModel = new Libro();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mensaje = $prestamoCtrl->crear($_POST['id_usuario'], $_POST['id_libro'], $_POST['fecha']);
        }
        $prestamos = $prestamoCtrl->listar();
        $usuarios = $usuarioModel->listar();
        $libros = $libroModel->listar();
        include 'views/prestamos.php';
        break;

    default:
        include 'views/login.php';
        break;
}
?>