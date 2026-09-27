<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    $pdo->exec('CREATE DATABASE IF NOT EXISTS glowcare_erp');
    echo "Database glowcare_erp created successfully.\n";
} catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}
