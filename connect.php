<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Bienvenue JOUEUR</title>
</head>

<body>

    <div class="container">
        <div class="tab-body" data-id="connexion">
            <form>
                <div class="row">
                    <input type="email" class="input" placeholder="Adresse Mail">
                </div>
                <div class="row">
                    <input placeholder="Mot de Passe" type="password" class="input">
                </div>
                <a href="#" class="link">Mot de passe oublié ?</a>
                <button class="btn" type="button">Connexion</button>
            </form>
        </div>

        <div class="tab-body" data-id="inscription">
            <form>
                <div class="row">
                    <input type="email" class="input" placeholder="Adresse Mail">
                </div>
                <div class="row">
                    <input type="password" class="input" placeholder="Mot de Passe">
                </div>
                <div class="row">
                    <input type="password" class="input" placeholder="Confirmer Mot de Passe">
                </div>
                <button class="btn" type="button">Inscription</button>
            </form>
        </div>

        <div class="tab-footer">
            <a class="tab-link active" data-ref="connexion" href="javascript:void(0)">Connexion</a>
            <a class="tab-link" data-ref="inscription" href="javascript:void(0)">Inscription</a>
        </div>
    </div>

    <script src="./js/connect.js"></script>
</body>
</html>