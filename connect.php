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
    if (isset($_POST['nom1']) && isset($_POST['email1']) && isset($_POST['mdp1']) && isset($_POST['mdp1_confirm'])) {
        // Inscription
        $nom = htmlspecialchars($_POST['nom1']);
        $email = htmlspecialchars($_POST['email1']);
        $password = $_POST['mdp1']; // Mot de passe non haché ici

        if ($password !== $_POST['mdp1_confirm']) {
            echo "Les mots de passe ne correspondent pas.";
            exit();
        }

        // Vérifier si l'email existe déjà dans la base
        $checkEmail = $conn->prepare("SELECT * FROM 'Utilisateurs' WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $result = $checkEmail->get_result();

        if ($result->num_rows > 0) {
            echo "L'adresse email existe déjà !";
        } else {
            // Hachage du mot de passe avant insertion
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // On insère un utilisateur avec les valeurs disponibles, incluant le niveau et la date de création
            // Le niveau est initialisé à un niveau par défaut (par exemple, "membre") et la date de création à la date actuelle
            $niveau = "membre"; // Niveau par défaut
            $date_creation = date("Y-m-d H:i:s"); // Date de création actuelle

            $insertQuery = $conn->prepare("INSERT INTO Utilisateurs (email, mot_de_passe, niveau, date_creation) VALUES (?, ?, ?, ?)");
            $insertQuery->bind_param("ssss", $email, $hashedPassword, $niveau, $date_creation);

            if ($insertQuery->execute()) {
                header("Location: ./index.php");
                exit();
            } else {
                echo "Erreur : " . $conn->error;
            }
        }
    } elseif (isset($_POST['email2']) && isset($_POST['mdp2'])) {
        // Connexion
        $email = htmlspecialchars($_POST['email2']);
        $password = $_POST['mdp2'];

        // Récupérer les données de l'utilisateur en fonction de l'email
        $sql = $conn->prepare("SELECT * FROM Utilisateurs WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Vérification du mot de passe avec password_verify
            if (password_verify($password, $row['mot_de_passe'])) {
                // Si la connexion est réussie, on initialise les sessions
                $_SESSION['email'] = $row['email'];
                $_SESSION['niveau'] = $row['niveau'];  // On récupère le niveau
                $_SESSION['date_creation'] = $row['date_creation'];  // Et la date de création
                header("Location: ./index.php");
                exit();
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        } else {
            echo "Utilisateur non trouvé.";
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
            <form method="POST" action="">
                <div class="row">
                    <input type="email" name="email2" class="input" placeholder="Adresse Mail" required>
                </div>
                <div class="row">
                    <input type="password" name="mdp2" class="input" placeholder="Mot de Passe" required>
                </div>
                <a href="#" class="link">Mot de passe oublié ?</a>
                <button class="btn" type="submit">Connexion</button>
            </form>
        </div>

        <div class="tab-body" data-id="inscription">
            <form method="POST" action="">
                <div class="row">
                    <input type="text" name="nom1" class="input" placeholder="Nom d'utilisateur" required>
                </div>
                <div class="row">
                    <input type="email" name="email1" class="input" placeholder="Adresse Mail" required>
                </div>
                <div class="row">
                    <input type="password" name="mdp1" class="input" placeholder="Mot de Passe" required>
                </div>
                <div class="row">
                    <input type="password" name="mdp1_confirm" class="input" placeholder="Confirmer Mot de Passe" required>
                </div>
                <button class="btn" type="submit">Inscription</button>
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
