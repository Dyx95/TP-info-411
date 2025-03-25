<?php
include("./include/connexion.php");
include("./include/crud_utilisateurs.php");

session_start();
// Vérifie si l'utilisateur est déjà connecté
if (isset($_SESSION['email'])) {
    // Sinon, redirige vers la page de profil normale
    header("Location: ./index.php");
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
                header("Location: ./index.php");
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
                header("Location: ./index.php");
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
    <link rel="stylesheet" href="./css/connect.css">
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