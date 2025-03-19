<?php
include("../db/db_connect.php");
include("../Crud/crud_utilisateurs.php");

session_start();
// Vérifie si l'utilisateur est déjà connecté
if (isset($_SESSION['email'])) {
    // Si l'utilisateur est administrateur, redirige vers la page d'administration
    if ($_SESSION['email'] == 'admin@admin.com') {
        header("Location: ../profil/admin_profil.php");
        exit();
    }
    // Sinon, redirige vers la page de profil normale
    header("Location: ../profil/profil.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nom1']) && isset($_POST['email1']) && isset($_POST['mdp1'])) {
        // Inscription
        $nom = $_POST['nom1'];
        $email = $_POST['email1'];
        $password = $_POST['mdp1']; // Pas de hachage pour le mot de passe

        $checkEmail = $conn->prepare("SELECT * FROM Utilisateurs WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $result = $checkEmail->get_result();

        if ($result->num_rows > 0) {
            echo "Email Address Already Exists!";
        } else {
            $insertQuery = $conn->prepare("INSERT INTO Utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (?, ?, ?)");
            $insertQuery->bind_param("sss", $nom, $email, $password);

            if ($insertQuery->execute() === TRUE) {
                header("Location: ../index.php");
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        }
    } elseif (isset($_POST['email2']) && isset($_POST['mdp2'])) {
        // Connexion
        $email = $_POST['email2'];
        $password = $_POST['mdp2'];

        $sql = $conn->prepare("SELECT * FROM Utilisateurs WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($password === $row['mot_de_passe']) { // Comparaison directe sans hachage
                $_SESSION['email'] = $row['email'];
                $_SESSION['nom_utilisateur'] = $row['nom_utilisateur'];
                header("Location: ../index.php");
                exit();
            } else {
                echo "Incorrect Email or Password";
            }
        } else {
            echo "Not Found, Incorrect Email or Password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cs/connect.css">
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

<?php 
include("../db/db_disconnect.php");
?>