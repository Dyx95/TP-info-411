<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenue JOUEUR</title>
    <link rel="icon" href="img/homer singe.jpg" type="image/x-icon">
    <link rel="stylesheet" href="./css/connect.css">
</head>
<body>
    <div class="form-container">
        <form id="login" class="active">
            <h2>Connexion</h2>
            <input type="text" placeholder="Nom d'utilisateur" required>
            <input type="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
        <form id="signup">
            <h2>Inscription</h2>
            <input type="text" placeholder="Nom complet" required>
            <input type="password" placeholder="Mot de passe" required>
            <input type="password" placeholder="Confirmez le mot de passe" required>
            <button type="submit">S'inscrire</button>
        </form>
    </div>
    <script src="js/script.js" defer></script>
</body>
</html>