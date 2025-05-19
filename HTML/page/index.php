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
    <section class = "space">
        
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
</body>


<footer>
    <p>Lilian Martineau, Raphaël Frin, Eloise Laurel, Vanoe Prigent </p>
    <p>Tous droits réservés.</p>
    <p>Boostly © 2025</p>
</footer>

</html>