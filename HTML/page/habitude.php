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
            <dialog id="editDialog">
                <h2>Modifier une habitude</h2>
                <form action="../traitement/modifier_habitude.php" method="post">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="form-group">
                        <label>Nom :</label>
                        <input type="text" name="nom" id="edit-nom" required />
                    </div>
                    <div class="form-group">
                        <label>Tag :</label>
                        <input type="text" name="tag" id="edit-tag" />
                    </div>
                    <div class="form-group">
                        <label>Heure :</label>
                        <input type="time" name="heure" id="edit-heure" required />
                    </div>
                    <div class="form-group">
                        <label>Occurence :</label>
                        <select name="occurence" id="edit-occurence" required>
                            <option value="quotidienne">Quotidienne</option>
                            <option value="hebdomadaire">Hebdomadaire</option>
                            <option value="mensuelle">Mensuelle</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit">Enregistrer les modifications</button>
                    </div>
                </form>
            </dialog>
            <div class="boutons_habitude">
                <button onclick="document.getElementById('mydialog').showModal()">Ajouter une
                    habitude</button>
            </div>
        </div>
        <?php
        // Inclusion du fichier de connexion à la base de données
        include '../elements/conn.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
            $id_to_delete = $_POST['delete_id'];

            // Requête pour supprimer l'habitude
            $delete_sql = "DELETE FROM habitude WHERE id_habitude = ? AND id_utilisateur = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->execute([$id_to_delete, $_SESSION['id_utilisateur']]);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aj_id'])) {
            $id_to_aj = $_POST['aj_id'];

            $aj_sql = "UPDATE habitude set actif = 1 WHERE id_habitude = ? AND id_utilisateur = ?";
            $aj_stmt = $conn->prepare($aj_sql);
            $aj_stmt->execute([$id_to_aj, $_SESSION['id_utilisateur']]);
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ret_id'])) {
            $id_to_ret = $_POST['ret_id'];

            $ret_sql = "UPDATE habitude set actif = 0 WHERE id_habitude = ? AND id_utilisateur = ?";
            $ret_stmt = $conn->prepare($ret_sql);
            $ret_stmt->execute([$id_to_ret, $_SESSION['id_utilisateur']]);
        }

        // Vérification si l'utilisateur est bien connecté
        if (isset($_SESSION['id_utilisateur'])) {
            // Récupération de l'ID de l'utilisateur depuis la session
            $id_utilisateur = $_SESSION['id_utilisateur'];
        }
        ?>
        <div class="habitudes-wrapper">
            <!-- Colonne Habitudes Inactives -->
            <div class="habitudes-colonne">
                <h2>Habitudes inactives</h2>
                <?php
                $sql_inactives = "SELECT id_habitude, Nom_habitude, Tag, heure, Occurence FROM `habitude` WHERE id_utilisateur = ? AND habitude_entreprise IS NULL AND actif = 0;";
                $stmt = $conn->prepare($sql_inactives);
                $stmt->execute([$id_utilisateur]);
                $habitudes_inactives = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($habitudes_inactives) {
                    foreach ($habitudes_inactives as $habitude) {
                        echo "<div class='habitude'>";
                        echo "<p>Nom : " . htmlspecialchars($habitude['Nom_habitude']) . "</p>";
                        echo "<p>Tag : " . htmlspecialchars($habitude['Tag']) . "</p>";
                        echo "<p>Heure : " . htmlspecialchars($habitude['heure']) . "</p>";
                        echo "<p>Occurence : " . htmlspecialchars($habitude['Occurence']) . "</p>";
                        echo "<div class='habitude-actions'>";
                        echo "<form method='POST' onsubmit='return confirm(\"Supprimer cette habitude ?\")'>";
                        echo "<input type='hidden' name='delete_id' value='" . $habitude['id_habitude'] . "'>";
                        echo "<button type='submit'>Supprimer</button>";
                        echo "</form>";
                        echo "<button type='button' class='edit-button' 
                            data-id='" . $habitude['id_habitude'] . "' 
                            data-nom='" . htmlspecialchars($habitude['Nom_habitude'], ENT_QUOTES) . "' 
                            data-tag='" . htmlspecialchars($habitude['Tag'], ENT_QUOTES) . "' 
                            data-heure='" . htmlspecialchars($habitude['heure'], ENT_QUOTES) . "' 
                            data-occurence='" . htmlspecialchars($habitude['Occurence'], ENT_QUOTES) . "'>
                            Modifier
                            </button>";
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='aj_id' value='" . $habitude['id_habitude'] . "'>";
                        echo "<button type='submit'>Activer</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Aucune habitude inactive.</p>";
                }
                ?>
            </div>

            <!-- Colonne Habitudes Actives -->
            <div class="habitudes-colonne">
                <h2>Habitudes actives</h2>
                <?php
                $sql_actives = "SELECT id_habitude, Nom_habitude, Tag, heure, Occurence FROM `habitude` WHERE id_utilisateur = ? AND habitude_entreprise IS NULL AND actif = 1;";
                $stmt = $conn->prepare($sql_actives);
                $stmt->execute([$id_utilisateur]);
                $habitudes_actives = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($habitudes_actives) {
                    foreach ($habitudes_actives as $habitude) {
                        echo "<div class='habitude'>";
                        echo "<p>Nom : " . htmlspecialchars($habitude['Nom_habitude']) . "</p>";
                        echo "<p>Tag : " . htmlspecialchars($habitude['Tag']) . "</p>";
                        echo "<p>Heure : " . htmlspecialchars($habitude['heure']) . "</p>";
                        echo "<p>Occurence : " . htmlspecialchars($habitude['Occurence']) . "</p>";
                        echo "<div class='habitude-actions'>";
                        echo "<form method='POST' onsubmit='return confirm(\"Supprimer cette habitude ?\")'>";
                        echo "<input type='hidden' name='delete_id' value='" . $habitude['id_habitude'] . "'>";
                        echo "<button type='submit'>Supprimer</button>";
                        echo "</form>";
                        echo "<button type='button' class='edit-button' 
                            data-id='" . $habitude['id_habitude'] . "' 
                            data-nom='" . htmlspecialchars($habitude['Nom_habitude'], ENT_QUOTES) . "' 
                            data-tag='" . htmlspecialchars($habitude['Tag'], ENT_QUOTES) . "' 
                            data-heure='" . htmlspecialchars($habitude['heure'], ENT_QUOTES) . "' 
                            data-occurence='" . htmlspecialchars($habitude['Occurence'], ENT_QUOTES) . "'>
                            Modifier
                            </button>";
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='ret_id' value='" . $habitude['id_habitude'] . "'>";
                        echo "<button type='submit'>retirer</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Aucune habitude active.</p>";
                }
                ?>
            </div>
        </div>
    </section>

</body>

<footer>
    <p>Lilian Martineau, Raphaël Frin, Eloise Laurel, Vanoe Prigent </p>
    <p>Tous droits réservés.</p>
    <p>Boostly © 2025</p>
</footer>