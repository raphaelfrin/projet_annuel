<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../script/script.js"></script>
    <title>Boostly</title>
</head>



<header>
    <div id="conn">
        <?php if (isset($_SESSION['Prenom'])): ?>
            <a id="profile" href="../connection_utilisateur/profile.php"><?= htmlspecialchars($_SESSION['Prenom']); ?></a>
            <a id="cree" href="../connection_utilisateur/deconnection.php">Se déconnecter</a>
        <?php else: ?>
            <a id="conne" href="../connection_utilisateur/login.php">Se connecter</a>
            <a id="cree" href="../connection_utilisateur/signup.php">Créer un compte</a>
        <?php endif; ?>
    </div>

    <?php
    include '../elements/nav.php';
    ?>
</header>

<body>
    <section class="space">

    </section>
    <section class="calendar-container">
        <div class="calendar-header">
            <button id="prevMonth">&lt;</button>
            <span id="monthYear"></span>
            <button id="nextMonth">&gt;</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Dim</th>
                    <th>Lun</th>
                    <th>Mar</th>
                    <th>Mer</th>
                    <th>Jeu</th>
                    <th>Ven</th>
                    <th>Sam</th>
                </tr>
            </thead>
            <tbody id="calendar"></tbody>
        </table>
    </section>

    <div class="tasks">
        <h2>Vos Tâches</h2>
        <?php
        include '../elements/conn.php';
        if (isset($_SESSION['id_utilisateur'])) {
            $id_utilisateur = $_SESSION['id_utilisateur'];
            $stmt = $conn->prepare("SELECT id_tache, nom_tache, date_debut, durée FROM tache WHERE id_utilisateur = ?");
            $stmt->execute([$id_utilisateur]);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $dateDebut = new DateTime($row['date_debut']);
                $dateFin = clone $dateDebut;
                $dateFin->add(new DateInterval('P' . (int) $row['durée'] . 'D')); // P5D = période de 5 jours
        
                echo '<li>' . htmlspecialchars($row['nom_tache']) .
                    ' (Début: ' . $dateDebut->format('Y-m-d') .
                    ', Fin: ' . $dateFin->format('Y-m-d') . ')';
                echo '</li>';
            }
        } else {
            echo '<p>Veuillez vous connecter pour voir vos tâches.</p>';
        }
        ?>

    </div>

    <div class="habits">
        <h2>Vos Habitudes</h2>
        <?php
        if (isset($_SESSION['id_utilisateur'])) {
            $id_utilisateur = $_SESSION['id_utilisateur'];

            // Requête pour récupérer les habitudes de l'utilisateur
            $stmt = $conn->prepare("SELECT Nom_habitude, Occurence FROM habitude WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam(':id_utilisateur', $id_utilisateur);
            $stmt->execute();

            // Affichage des habitudes
            echo '<ul>';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<li>' . htmlspecialchars($row['Nom_habitude']) . ' (Occurence: ' . $row['Occurence'] . ')</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>Veuillez vous connecter pour voir vos habitudes.</p>';
        }
        ?>
    </div>
</body>


<footer>
    <p>Lilian Martineau, Raphaël Frin, Eloise Laurel, Vanoe Prigent </p>
    <p>Tous droits réservés.</p>
    <p>Boostly © 2025</p>
</footer>

</html>