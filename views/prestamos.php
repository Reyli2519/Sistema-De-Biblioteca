<!DOCTYPE html>
<html>
<head>
    <title>Préstamos - Biblioteca</title>
</head>
<body>
    <h1>Gestionar Préstamos</h1>
    <!-- Formulario para crear un nuevo préstamo -->
    <form method="POST" action="index.php?action=prestamos">
        Usuario: <select name="id_usuario" required>
            <?php foreach ($usuarios as $u): ?>
                <option value="<?php echo $u['id_usuario']; ?>"><?php echo $u['nombre'] . ' ' . $u['apellido']; ?></option>
            <?php endforeach; ?>
        </select><br>
        Libro: <select name="id_libro" required>
            <?php foreach ($libros as $l): ?>
                <option value="<?php echo $l['id_libro']; ?>"><?php echo $l['titulo']; ?></option>
            <?php endforeach; ?>
        </select><br>
        Fecha Préstamo: <input type="date" name="fecha" required><br>
        <button type="submit">Crear Préstamo</button>
    </form>
    <p><?php echo $mensaje; ?></p>
    <!-- Lista de préstamos existentes -->
    <ul>
        <?php foreach ($prestamos as $p): ?>
            <li><?php echo $p['usuario'] . ' - ' . $p['libro'] . ' (Estado: ' . $p['estado'] . ')'; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=dashboard">Volver al inicio</a>
</body>
</html>