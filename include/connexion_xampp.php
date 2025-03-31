<?php
// Définir les informations de connexion
$host = 'localhost';  // ou l'adresse de votre serveur de base de données
$dbname = 'test';
$username = 'root';
$password = '';

// Connexion au serveur de base de données MySQL avec mysqli
$conn = mysqli_connect($host, $username, $password, $dbname);

// Vérifier si la connexion a échoué
if (mysqli_connect_errno()) {
    echo 'Désolé, connexion au serveur ' . $host . ' impossible. Erreur : ' . mysqli_connect_error() . "\n";
    exit();  // Arrêter le script en cas d'erreur
}

// Spécifier l'encodage UTF-8 pour dialoguer avec la base de données
if (!mysqli_set_charset($conn, 'utf8')) {
    echo 'Erreur au chargement de l\'encodage UTF-8 : ' . mysqli_error($conn) . "\n";
    exit();  // Arrêter le script en cas d'erreur
}