<?php
session_start();
include '../elements/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = isset($_POST['nom_tache']) ? trim($_POST['nom_tache']) : '';
    $tag = isset($_POST['tag']) ? trim($_POST['tag']) : '';
    $date_debut = isset($_POST['date_debut']) ? $_POST['date_debut'] : '';
    $duree = isset($_POST['duree']) ? trim($_POST['duree']) . ':00' : '';
    $id_utilisateur = $_SESSION['id_utilisateur'];
    

    $sql = "INSERT INTO tache
            (nom_tache, tag, date_debut, Durée, id_utilisateur) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom, $tag, $date_debut, $duree, $id_utilisateur]);

    header('Location: ../page/tasks.php');
    exit;
} else {
    echo "Formulaire non soumis.";
}