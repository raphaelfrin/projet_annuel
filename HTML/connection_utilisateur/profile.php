<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../script/script.js"></script>
    <title>Boostly-profile</title>
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
    </section>
</body>

<footer>
    <p>Lilian Martineau, Raphaël Frin, Eloise Laurel, Vanoe Prigent </p>
    <p>Tous droits réservés.</p>
    <p>Boostly © 2025</p>
</footer>