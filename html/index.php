<?php session_start(); ?>
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
            <a id="cree" href="signup.php">crée un compte</a>
        <?php endif; ?>
    </div>

    <nav>
        <a href="index.php">dashbord</a>
        <a href="tasks.php">tache</a>
        <a href="habitude.php">habitude</a>
        <a href="entreprise.php">entreprise</a>
    </nav>
</header>

<body>


    <div id="current_date">

    </div>
    <div id="taks">
        <a href="../html/tasks.html">Taches</a>
    </div>
    <div id="calendar">

    </div>
    <div id="habits">
        <a href="../html/habits.html">habits</a>
    </div>

    <div id="selectvue">
        <input type="button" value="Professionnel" name="professionnel" id="button_professionnel">
    </div>
</body>
<footer>
    <p>Boostly © 2025<br>
        Projet Annuel ESGI B1<br>
        Lilian Martineau</p>

</footer>

</html>