<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/connect.css">
    <title>Bienvenue JOUEUR</title>
</head>

<body>
    <div class="boite" id="boite">
        <div class="formulaire inscription">
            <form method="POST" action="login.php">
                <h1>Créer compte</h1>
                <input type="text" id="nom1" name="nom1" placeholder="Nom">
                <input type="email" id="email1" name="email1" placeholder="Email">
                <input type="password" id="mdp1" name="mdp1" placeholder="Mot de passe">
                <button type="submit">S'incrire</button>
            </form>
        </div>
        <div class="formulaire connexion">
            <form method="POST" action="login.php">
                <h1>Connexion</h1>
                <input type="email" id="email2" name="email2" placeholder="Email">
                <input type="password" id="mdp2" name="mdp2" placeholder="Mot de passe">
                <a href="#">Mot de passe oublié ?</a>
                <button type="submit">Connectez-vous</button>
            </form>
        </div>
        <div class="bascule-boite">
            <div class="bascule">
                <div class="panneau bascule-gauche">
                    <h1>Bienvenue</h1>
                    <p>Déjà un compte ? Connectez-vous</p>
                    <button class="cache" id="login">Connectez-vous</button>
                </div>
                <div class="panneau bascule-droit">
                    <h1>Bonjour!</h1>
                    <p>Première fois sur notre site ? Enregistrez-vous</p>
                    <button class="cache" id="register">Inscription</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/connect.js"></script>
</body>
</html>