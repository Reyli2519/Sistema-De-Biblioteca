# Sistema de Biblioteca Web

Un sistema simple de gestión de biblioteca desarrollado en PHP con MVC básico, PDO para BD y validaciones en cliente/servidor.

## Características
- **Usuarios**: Registro, login y roles (lector por defecto).
- **Libros y Autores**: CRUD con validaciones (ej. ISBN, límites de préstamos).
- **Préstamos**: Crear con límites (3 por usuario, libro único).
- Seguridad: Sesiones, hashing de passwords, prepared statements.

## Instalación
1. Clona el repo: `git clone https://github.com/Reyli2519/Sistema-De-Biblioteca.git`
2. Configura una BD MySQL llamada 'biblioteca' con tablas (ver script SQL en docs).
3. Ajusta credenciales en `config/Database.php`.
4. Ejecuta en un servidor local (ej. XAMPP) apuntando a `index.php`.

## Uso
- Accede a `index.php` para login/registro.
- Navega por dashboard para gestionar libros, autores y préstamos.

## Base de Datos
- Importa `database.sql` en MySQL para crear las tablas (usuarios, autores, libros, prestamos).
- Ajusta credenciales en `config/Database.php`.
## Tecnologías
- PHP 7+, MySQL, HTML/CSS/JS básico.

## Notas
- Proyecto educativo. No usar en producción sin mejoras (ej. CSRF, encriptación de BD).
- Creado por Reyli Gonzalez 
