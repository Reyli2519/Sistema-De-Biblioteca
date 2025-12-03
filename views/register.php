<!DOCTYPE html>
<html>
<head>
    <title>Registro - Biblioteca</title>
</head>
<body>
    <h1>Registro</h1>
    <form method="POST" action="index.php?action=register">
        Email: <input type="email" name="email" required><br>
        Contraseña: <input type="password" name="password" required minlength="6"><br>
        Nombre: <input type="text" name="nombre" required><br>
        Apellido: <input type="text" name="apellido" required><br>
        <button type="submit">Registrar</button>
    </form>
    <p><?php echo $error; ?></p>
    <a href="index.php?action=login">Iniciar Sesión</a>
</body>
</html>
