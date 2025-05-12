<?php
include '../elements/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = isset($_POST['Nom']) ? trim($_POST['Nom']) : '';
    $prenom = isset($_POST['Prenom']) ? trim($_POST['Prenom']) : '';
    $mail = isset($_POST['Mail']) ? trim($_POST['Mail']) : '';
    $ddn = isset($_POST['DDN']) ? $_POST['DDN'] : '';
    $mdp = isset($_POST['mdp']) ? password_hash($_POST['mdp'], PASSWORD_DEFAULT) : '';



    $sql = "INSERT INTO utilisateurs (Nom, Prenom, Mail, DDN, mdp)
                VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom, $prenom, $mail, $ddn, $mdp]);

    header('Location: ../connection_utilisateur/login.php');
} else {
    echo "Formulaire non soumis.";
}
?>