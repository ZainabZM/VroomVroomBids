<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "127.0.0.1";
$port = "3306"; // Changer pour 3306 pour windows ou 8889 pour Apple
$dbname = "bocal_vroomvroombids";
$username = "root";
$password = ""; //Mot de passe Apple = "root", ne rien mettre sur Windows

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
