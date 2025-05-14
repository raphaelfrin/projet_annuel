<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../script/script.js"></script>
    <title>Boostly-habitude</title>
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
        <h1 class="titre_habitude">Habitudes</h1>
        <div id=" create_habits">
            <dialog id="mydialog">
                <h2>Ajouter une habitudes</h2>
                <form action="../traitement/traitement_habitude.php" method="post">
                    <div class="form-group">
                        <label for="habitude">Nom de l'habitude :</label>
                        <input type="text" name="nom" placeholder="Nom de l'habitude" required />
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag :</label>
                        <input type="text" name="tag" placeholder="Tag" />
                    </div>
                    <div class="form-group">
                        <label for="heure">Heure :</label>
                        <input type="time" name="heure" required />
                    </div>
                    <div class="form-group">
                        <label for="occurence">Occurence :</label>
                        <select name="occurence" required>
                            <option value="">-- Choisissez une option --</option>
                            <option value="quotidienne">Quotidienne</option>
                            <option value="hebdomadaire">Hebdomadaire</option>
                            <option value="mensuelle">Mensuelle</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit">Ajouter</button>
                    </div>
                </form>
            </dialog>
            <div class="boutons_habitude">
                <button onclick="document.getElementById('mydialog').showModal()">Ajouter une
                    habitude</button>
            </div>
        </div>
        <div class="container-habitudes">
            <?php
            // Inclusion du fichier de connexion à la base de données
            include '../elements/conn.php';

            // Vérification si l'utilisateur est bien connecté
            if (isset($_SESSION['id_utilisateur'])) {
                // Récupération de l'ID de l'utilisateur depuis la session
                $id_utilisateur = $_SESSION['id_utilisateur'];

                // Requête SQL pour récupérer toutes les habitudes de l'utilisateur
                $sql = "SELECT id_habitude Nom_habitude, Tag, heure, Occurence, actif FROM `habitude` WHERE id_utilisateur = ? AND habitude_entreprise IS NULL;";

                // Préparation de la requête
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id_utilisateur]);

                // Récupération des résultats
                $habitudes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Vérifier si des habitudes ont été trouvées
                if ($habitudes) {
                    // Affichage des habitudes
                    foreach ($habitudes as $habitude) {
                        echo "<div class='habitude'>";
                        echo "<p>Nom : " . htmlspecialchars($habitude['Nom_habitude']) . "</p>";
                        echo "<p>Tag : " . htmlspecialchars($habitude['Tag']) . "</p>";
                        echo "<p>Heure : " . htmlspecialchars($habitude['heure']) . "</p>";
                        echo "<p>Occurence : " . htmlspecialchars($habitude['Occurence']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Aucune habitude trouvée.</p>";
                }
            } else {
                // Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
                header('Location: ../../connection_utilisateur/login.php');
                exit();
            }
            ?>
        </div>
    </section>

</body>

<footer>
    <p>Lilian Martineau, Raphaël Frin, Eloise Laurel, Vanoe Prigent </p>
    <p>Tous droits réservés.</p>
    <p>Boostly © 2025</p>
</footer>