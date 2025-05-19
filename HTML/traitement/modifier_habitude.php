<?php
session_start();
require_once '../elements/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $tag = $_POST['tag'];
    $heure = $_POST['heure'];
    $occurence = $_POST['occurence'];

    $sql = "UPDATE habitude SET Nom_habitude = ?, Tag = ?, heure = ?, Occurence = ? 
            WHERE id_habitude = ? AND id_utilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom, $tag, $heure, $occurence, $id, $_SESSION['id_utilisateur']]);

    header("Location: ../page/habitude.php");
    exit;
}
?>