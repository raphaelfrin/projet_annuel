<?php
include '../elements/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = isset($_POST['Nom']) ? trim($_POST['Nom']) : '';
    $tag = isset($_POST['tag']) ? trim($_POST['tag']) : '';
    $occurence = isset($_POST['DDN']) ? $_POST['DDN'] : '';
    $id_utilisateur = isset($_POST['id_utilisateur']) ? $_POST['id_utilisateur'] : '';



    $sql = "INSERT INTO habitude (Nom_habitude, Tag, Occurence, id_utilisateur) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom, $tag, $dateTime, $id_utilisateur]);

    header('Location: ../connection_utilisateur/login.php');
} else {
    echo "Formulaire non soumis.";
}