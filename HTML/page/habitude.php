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
                Ajouter une habitudes<br />
                <form action="traitement_habitude.php" method="post">
                    <div class="form-group">
                        <label for="habitude">Nom de l'habitude :</label>
                        <input type="text" name="nom_habitude" placeholder="Nom de l'habitude" required />
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag :</label>
                        <input type="text" name="tag" placeholder="Tag" required />
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
                        <button type="button" onclick="document.getElementById('mydialog').close()">Fermer</button>
                    </div>
                </form>
            </dialog>
            <div class="boutons">
                <button onclick="document.getElementById('mydialog').showModal()">Ajouter unetache</button>
            </div>
        </div>

    </section>
</body>

<footer>
    <p>Lilian Martineau, Raphaël Frin, Eloise Laurel, Vanoe Prigent </p>
    <p>Tous droits réservés.</p>
    <p>Boostly © 2025</p>
</footer>