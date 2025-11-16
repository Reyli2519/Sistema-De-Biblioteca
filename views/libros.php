<!DOCTYPE html>
<html>
<head>
    <title>Libros - Biblioteca</title>
</head>
<body>
    <h1>Gestionar Libros</h1>
    <!-- Formulario para crear un nuevo libro -->
    <form method="POST" action="index.php?action=libros">
        Título: <input type="text" name="titulo" required><br>
        ISBN: <input type="text" name="isbn" required pattern="\d{10}(\d{3})?"><br>
        Año: <input type="number" name="anio"><br>
        Autor: <select name="id_autor" required>
            <?php foreach ($autores as $autor): ?>
                <option value="<?php echo $autor['id_autor']; ?>"><?php echo $autor['nombre'] . ' ' . $autor['apellido']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit">Crear Libro</button>
    </form>
    <p><?php echo $mensaje; ?></p>
    <!-- Lista de libros existentes -->
    <ul>
        <?php foreach ($libros as $libro): ?>
            <li><?php echo $libro['titulo'] . ' - ' . $libro['isbn'] . ' (Autor: ' . $libro['nombre'] . ' ' . $libro['apellido'] . ')'; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=dashboard">Volver al inicio</a>
</body>
</html>