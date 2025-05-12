<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../script/script.js"></script>
    <title>Boostly-creation de compte</title>
</head>

<header>
    <div id="conn">
        <a id="conne" href="login.php">Se connecter</a>
    </div>

    <?php
include '../elements/nav.php';
    ?>
</header>

<body>
    <section class="space">
        <h1 class="titre">Bienvenue sur Boostly</h1>
        <p>Votre site tout-en-un pour booster votre productivité quotidienne</p>

        <div id="créate">
            <form action="../traitement/traitement_inscription.php" method="POST">
                <h2>Formulaire d'inscription</h2>
                <div class="form-group">
                    <label for="Nom"> Nom :</label>
                    <input type="text" id="Nom" name="Nom" required>
                </div>
                <div class="form-group">
                    <label for="Prenom">Prénom :</label>
                    <input type="text" id="Prenom" name="Prenom" required>
                </div>
                <div class="form-group">
                    <label for="Mail">Adresse email :</label>
                    <input type="email" id="Mail" name="Mail" required>
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe :</label>
                    <input type="password" id="mdp" name="mdp" required>
                </div>
                <div class="form-group">
                    <label for="DDN">Date de naissance :</label>
                    <input type="date" id="DDN" name="DDN" required>
                </div>
                <button type="submit" class="inscrit">Envoyer formulaire</button>
            </form>
        </div>
    </section>
</body>

<footer>
    <p>Lilian Martineau, Raphaël Frin, Eloise Laurel, Vanoe Prigent </p>
    <p>Tous droits réservés.</p>
    <p>Boostly © 2025</p>
</footer>

</html>