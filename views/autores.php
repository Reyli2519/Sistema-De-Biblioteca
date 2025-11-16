<!DOCTYPE html>
<html>
<head>
    <title>Autores - Biblioteca</title>
</head>
<body>
    <h1>Gestionar Autores</h1>
    <!-- Formulario para crear un nuevo autor -->
    <form method="POST" action="index.php?action=autores">
        Nombre: <input type="text" name="nombre" required><br>
        Apellido: <input type="text" name="apellido" required><br>
        Fecha Nacimiento: <input type="date" name="fecha"><br>
        Nacionalidad: <input type="text" name="nacionalidad"><br>
        <button type="submit">Crear Autor</button>
    </form>
    <p><?php echo $mensaje; ?></p>
    <!-- Lista de autores existentes -->
    <ul>
        <?php foreach ($autores as $autor): ?>
            <li><?php echo $autor['nombre'] . ' ' . $autor['apellido'] . ' - ' . $autor['nacionalidad']; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=dashboard">Volver al inicio</a>
</body>
</html>