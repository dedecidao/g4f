<?php

// Informações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'g4f';
$username = 'root';
$password = '';

// Inicialização da conexão PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Outras configurações da conexão, se necessário
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
