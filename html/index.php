<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv=" X-UA-Compatible" content="IE=edge" <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="../script/script.js"></script>
    <title>Boostly</title>
</head>

<body>
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

        <nav>
            <a href="index.php">dashbord</a>
            <a href="tasks.php">tâche</a>
            <a href="habitude.php">habitude</a>
            <a href="entreprise.php">entreprise</a>
        </nav>
    </header>

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



    <footer>
        <p>Lilian Martineau, Raphaël Frin, Eloise Laurel, Vanoe Prigent </p>
        <p>Tous droits réservés.</p>
        <p>Boostly © 2025</p>
    </footer>
</body>

</html>