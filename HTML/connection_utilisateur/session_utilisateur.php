<?php
session_start();
include("../elements/conn.php");

if (isset($_POST['mail'], $_POST['mdp'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    $stmt = $conn->prepare("SELECT id_utilisateur, mdp, Nom, Prenom, ddn FROM utilisateurs WHERE Mail = ?");
    $stmt->execute([$mail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($mdp, $user['mdp'])) {
        $_SESSION['Mail'] = $_POST['mail'];
        $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
        $_SESSION['Nom'] = $user['Nom'];
        $_SESSION['Prenom'] = $user['Prenom'];
        $_SESSION['ddn'] = $user['ddn'];
        header("Location: ../page/index.php");
        exit;
    } else {
        header("Location: ../connection_utilisateur/login.php?error=1");
        exit;
    }
} else {
    header("Location: ../connection_utilisateur/login.php?error=2");
    exit;
}
?>