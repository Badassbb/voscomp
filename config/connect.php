<?php
$servername = "";
$user = "root";
$pwd = "";
$dbname="test2601";

/* Connexion à la BDD */
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pwd);
    $pdo->exec("SET CHARACTER SET utf8"); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}