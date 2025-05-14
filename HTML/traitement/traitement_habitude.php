<?php
session_start();
include '../elements/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $tag = isset($_POST['tag']) ? trim($_POST['tag']) : '';
    $heure = isset($_POST['heure']) ? trim($_POST['heure']) . ':00' : '';
    $occurence = isset($_POST['occurence']) ? trim($_POST['occurence']) : '';
    $id_utilisateur = $_SESSION['id_utilisateur'];

    $sql = "INSERT INTO habitude (Nom_habitude, Tag, Heure, Occurence, id_utilisateur) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom, $tag, $heure, $occurence, $id_utilisateur]);

    header('Location: ../page/habitude.php');
    exit();
} else {
    echo "Formulaire non soumis.";
}
?>