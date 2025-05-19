<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../script/script.js"></script>
    <title>Boostly-tâche</title>
</head>


<body>
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

    <section class="space">
        <h1>Tâches</h1>

        <!-- Modal -->
        <div id="create_habits">
            <dialog id="mydialog">
                Ajouter une tâche<br />
                <form action="../traitement/traitement_taches.php" method="post">
                    <div class="form-group">
                        <label for="nom_tache">Nom de la tâche :</label>
                        <input type="text" name="nom_tache" placeholder="Nom de la tâche" required />
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag :</label>
                        <input type="text" name="tag" placeholder="Tag"/>
                    </div>
                    <div class="form-group">
                        <label for="date_debut">Date de début :</label>
                        <input type="date" name="date_debut" required />
                    </div>
                    <div class="form-group">
                        <label for="duree">Durée :</label>
                        <input type="time" name="duree" required />
                    </div>
                    <div class="form-group">
                        <button type="button" onclick="document.getElementById('mydialog').close()">Fermer</button>
                    </div>
                    <div>
                        <button type="submit">Créer la tâche</button>
                    </div>
                </form>
            </dialog>
            <div class="boutons">
                <button onclick="document.getElementById('mydialog').showModal()">Ajouter une tâche</button>
            </div>
        </div>

    </section>
</body>

<footer>
    <p>Lilian Martineau, Raphaël Frin, Eloise Laurel, Vanoe Prigent </p>
    <p>Tous droits réservés.</p>
    <p>Boostly © 2025</p>
</footer>

</html>