<?php
try {
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=customers', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}
catch(PDOException $e) {
    echo $e->getMessage();
}
