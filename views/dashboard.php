<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Biblioteca</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['user']['nombre']; ?></h1>
    <!-- Enlaces para navegar a las secciones principales -->
    <a href="index.php?action=libros">Gestionar Libros</a> |
    <a href="index.php?action=autores">Gestionar Autores</a> |
    <a href="index.php?action=prestamos">Gestionar Préstamos</a> |
    <a href="index.php?action=logout">Cerrar Sesión</a>
    <!-- Podría agregar más cosas aquí, como estadísticas rápidas, pero por ahora es simple -->
</body>
</html>