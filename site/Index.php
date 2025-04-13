<?php
include("./site/include/connect.php");

session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['Utilisateur'])) {
    // Redirige vers la page de connexion
    header('Location: connexion.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Solo Leveling</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div class="container">
        <!-- En-tête -->
        <header class="main-header">
            <div class="logo">
                <img src="./img/homer_singe.jpg" alt="Logo du site">
            </div>
            <div class="player-info">
                <span class="player-name">Joueur</span>
                <button id="profile-btn" class="profile-btn">🧑‍💻</button>
            </div>
        </header>

        <!-- Profil du joueur -->
        <div id="profile-popup" class="profile-popup hidden">
            <h3>Profil du Joueur</h3>
            <p><strong>Nom :</strong> Nom du Joueur</p>
            <p><strong>Niveau :</strong> <span id="player-level">1</span></p>
            <p><strong>Expérience :</strong> <span id="player-exp">0</span> / 100 XP</p>
        </div>

        <!-- Barre d'expérience -->
        <section class="experience-section">
            <h2>Niveau 1</h2>
            <div class="experience-bar">
                <div class="experience-progress" style="width: 0%;"></div>
            </div>
        </section>

        <!-- Interface des missions -->
        <main class="missions-container">
            <h1>Quêtes du Jour</h1>

            <!-- Mission quotidienne 1 -->
            <div class="mission">
                <h2>Mission Quotidienne 1</h2>
                <p>Description : Terminer 50 pompes.</p>
                <p>Expérience : 20 XP</p>
                <p>Temps restant : 8 heures</p>
                <input type="checkbox" class="daily-checkbox" data-exp="20">
            </div>

            <!-- Mission quotidienne 2 -->
            <div class="mission">
                <h2>Mission Quotidienne 2</h2>
                <p>Description : Lire 10 pages d'un livre.</p>
                <p>Expérience : 15 XP</p>
                <p>Temps restant : 6 heures</p>
                <input type="checkbox" class="daily-checkbox" data-exp="15">
            </div>

            <!-- Mission spéciale -->
            <div class="mission special">
                <h2>Mission Spéciale</h2>
                <p>Description : Compléter un marathon.</p>
                <p>Expérience : 100 XP</p>
                <p>Temps restant : 5 jours</p>
                <input type="checkbox" class="special-checkbox" data-exp="50">
            </div>
        </main>

    </div>
    <script src="./js/index.js"></script>
</body>
</html>
