<?php 
function create_utilisateur($conn, $nom_utilisateur, $email, $mot_de_passe){
    $sql = "INSERT INTO `Utilisateurs`(`nom_utilisateur`, `email`, `mot_de_passe`) 
            VALUES ('$nom_utilisateur', '$email', '$mot_de_passe')";
    $ret = mysqli_query($conn, $sql);
    return $ret;
}

function update_utilisateur($conn, $id, $nom_utilisateur, $email, $mot_de_passe){
    $sql = "UPDATE `Utilisateurs` SET `nom_utilisateur`='$nom_utilisateur', `email`='$email', `mot_de_passe`='$mot_de_passe' WHERE `id`='$id'";
    $ret = mysqli_query($conn, $sql);
    return $ret;
}

function delete_utilisateur($conn, $id){
    $sql = "DELETE FROM `Utilisateurs` WHERE `id`='$id'";
    $ret = mysqli_query($conn, $sql);
    return $ret;
}

function select_utilisateur($conn, $id){
    $sql = "SELECT * FROM `Utilisateurs` WHERE `id`='$id'";
    $ret = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($ret);
    return $row;
}

function list_utilisateurs($conn){
    $sql = "SELECT * FROM `Utilisateurs`";
    $res = mysqli_query($conn, $sql);
    $tab = rs_to_tab($res);
    return $tab;
}

function rs_to_tab($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}
?>