<?php
session_start();
include("conn.php");

if (isset($_POST['mail'], $_POST['mdp'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    $stmt = $conn->prepare("SELECT mdp, Nom, Prenom, ddn FROM utilisateurs WHERE Mail = ?");
    $stmt->execute([$mail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($mdp, $user['mdp'])) {
        $_SESSION['Mail'] = $_POST['mail'];
        $_SESSION['Nom'] = $user['Nom'];
        $_SESSION['Prenom'] = $user['Prenom'];
        $_SESSION['ddn'] = $user['ddn'];
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?error=1");
        exit;
    }
} else {
    header("Location: login.php?error=2");
    exit;
}
?>