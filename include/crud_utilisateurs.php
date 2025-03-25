<?php
function create_utilisateur($conn, $nom_utilisateur, $email, $mot_de_passe, $niveau){
    // Requête SQL pour insérer un nouvel utilisateur avec le niveau
    $sql = "INSERT INTO `Utilisateurs`(`nom_utilisateur`, `email`, `mot_de_passe`, `niveau`) 
            VALUES ('$nom_utilisateur', '$email', '$mot_de_passe', '$niveau')";
    $ret = mysqli_query($conn, $sql);
    return $ret;
}

function update_utilisateur($conn, $id, $nom_utilisateur, $email, $mot_de_passe, $niveau){
    // Requête SQL pour mettre à jour un utilisateur existant, y compris le niveau
    $sql = "UPDATE `Utilisateurs` SET `nom_utilisateur`='$nom_utilisateur', `email`='$email', `mot_de_passe`='$mot_de_passe', `niveau`='$niveau' WHERE `id`='$id'";
    $ret = mysqli_query($conn, $sql);
    return $ret;
}

function delete_utilisateur($conn, $id){
    // Requête SQL pour supprimer un utilisateur par son id
    $sql = "DELETE FROM `Utilisateurs` WHERE `id`='$id'";
    $ret = mysqli_query($conn, $sql);
    return $ret;
}

function select_utilisateur($conn, $id){
    // Requête SQL pour sélectionner un utilisateur par son id
    $sql = "SELECT * FROM `Utilisateurs` WHERE `id`='$id'";
    $ret = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($ret);
    return $row;
}

function list_utilisateurs($conn){
    // Requête SQL pour récupérer tous les utilisateurs
    $sql = "SELECT * FROM `Utilisateurs`";
    $res = mysqli_query($conn, $sql);
    $tab = rs_to_tab($res);
    return $tab;
}

function rs_to_tab($rs){
    // Conversion du résultat d'une requête en un tableau associatif
    $tab = []; 
    while($row = mysqli_fetch_assoc($rs)){
        $tab[] = $row;    
    }
    return $tab;
}
?>
