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
        <header>
            <h1>Tableau de Bord - Solo Leveling</h1>
        </header>

        <!-- Barre de progression -->
        <section class="progress-section">
            <h2>Niveau du Joueur</h2>
            <div class="progress-bar">
                <div class="progress" style="width: 0%;">0%</div>
            </div>
        </section>

        <!-- Missions -->
        <section class="missions">
            <h2>Quêtes du Jour</h2>
            <div id="daily-missions">
                <!-- Les missions quotidiennes s'afficheront ici -->
            </div>
            <div id="special-mission">
                <!-- La mission spéciale s'affichera ici -->
            </div>
        </section>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
