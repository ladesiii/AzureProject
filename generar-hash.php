<?php
/**
 * Script auxiliar para generar hashes de contraseñas
 * Uso: php generar-hash.php <contraseña>
 * Ejemplo: php generar-hash.php miContraseña123
 */

if ($argc < 2) {
    echo "Uso: php generar-hash.php <contraseña>\n";
    echo "Ejemplo: php generar-hash.php 123456\n";
    exit(1);
}

$password = $argv[1];
$hash = password_hash($password, PASSWORD_BCRYPT);

echo "\n";
echo "========================================\n";
echo "Contraseña: $password\n";
echo "========================================\n";
echo "Hash generado:\n";
echo "$hash\n";
echo "========================================\n";
echo "\nAhora puedes copiar este hash e insertarlo en tu base de datos SQL Server.\n";
echo "Ejemplo de INSERT:\n";
echo "INSERT INTO usuario (email, password, nombre, id_rol) VALUES ('test@example.com', '$hash', 'Test User', 1);\n";
echo "\n";
