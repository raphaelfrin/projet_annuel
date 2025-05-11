
<?php session_start(); 

include '../html/conn.php';

if (

    isset($_POST['nom_habitude'], $_POST['tag'], $_POST['occurence']) &&
    isset($_SESSION['id_utilisateur'])
) 
    echo "<pre>";
    var_dump($_POST);
    var_dump($_SESSION['id_utilisateur']);
    echo "</pre>";

    isset($_POST['nom_habitude'], $_POST['tag'], $_POST['occurence']) &&
    isset($_SESSION['id_utilisateur'])
 {
    $nom = $_POST['nom_habitude'];
    $tag = intval($_POST['tag']);
    $occurence = $_POST['occurence'];
    $id_utilisateur = intval($_SESSION['id_utilisateur']);

    $dateTime = date('Y-m-d H:i:s', strtotime($occurence));
    if (!$dateTime || $dateTime === "1970-01-01 01:00:00") {
        $dateTime = date('Y-m-d H:i:s');
    }

    try {
        $sql = "INSERT INTO habitude (Nom_habitude, Tag, Occurence, id_utilisateur) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom, $tag, $dateTime, $id_utilisateur]);
    } catch (PDOException $e) {
        echo "Erreur d'insertion : " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="script/script.js"></script>
    <title>Boostly</title>
</head>

<header>
    <div id="conn">
        <?php if (isset($_SESSION['Prenom'])): ?>
            <a id="profile" href="profile.php"><?= htmlspecialchars($_SESSION['Prenom']); ?></a>
            <a id="cree" href="deconnection.php">Se déconnecter</a>
        <?php else: ?>
            <a id="conne" href="login.php">Se connecter</a>
            <a id="cree" href="signup.php">Créer un compte</a>
        <?php endif; ?>
    </div>
<?php
include '../elements/nav.php';
?>
</header>

<body>
    <section class="space">
        <h1>Habitudes</h1>

    <!-- Modal -->
    <div id="create_habits">
        <dialog id="mydialog">
            Ajouter une habitudes<br/>
            <form id="form_createhabits" method="POST">
                <input type="text" name="nom_habitude" placeholder="Nom de l'habitude" required/>
                <input type="number" name="tag" placeholder="Tag (nombre)" required/>
                <input type="datetime-local" name="occurence" placeholder="Occurence" required/>
                <button type="submit">Ajouter</button>
                <button type="button" onclick="document.getElementById('mydialog').close()">Fermer</button>
            </form>
        </dialog>
        <div class="boutons"><button onclick="document.getElementById('mydialog').showModal()">Ajouter une tache</button></div>
        <script>
            var $dialog = document.getElementById('mydialog');
            if(!('show' in $dialog)){
                // fallback si dialog non supporté
            }
            $dialog.addEventListener('close', function() {
                console.log('Fermeture. ', this.returnValue);
            });
        </script>
    </div>

    </section>
</body>

<footer>
    <p>Lilian Martineau, Raphaël Frin, Eloise Laurel, Vanoe Prigent </p>
    <p>Tous droits réservés.</p>
    <p>Boostly © 2025</p>
</footer>