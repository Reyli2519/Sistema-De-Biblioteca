<!DOCTYPE html>
<html>
<head>
    <title>Login - Biblioteca</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="POST" action="index.php?action=login">
        Email: <input type="email" name="email" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <p><?php echo $error; ?></p>
    <a href="index.php?action=register">Registrarse</a>
    <script>
        // Validación básica en JS, por si las moscas
        document.querySelector('form').addEventListener('submit', function(e) {
            if (!this.email.value || !this.password.value) {
                alert('Campos obligatorios');
                e.preventDefault();
            }
        });
    </script>
</body>
</html>