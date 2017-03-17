<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=kandt-webp2019;port=3306','root','root');
} catch(PDOException $exception) {
    die($exception->getMessage());
}
$pdo->exec('SET NAMES UTF8');
