<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Boostly - Connexion</title>
</head>
<header>
    <nav>
        <a href="index.php">dashbord</a>
        <a href="login.php">login</a>
        <a href="signup.php">singup</a>
        <a href="tasks.php">tache</a>
    </nav>
</header>
<body>
    <h1>Bienvenue sur Boostly</h1>
    <p>Votre site tout-en-un pour booster votre productivité quotidienne</p>

    <div id="connexion">
            <form action="session_utilisateur.php" method="post">
                <h2>Connection</h2>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 1) {
                        echo "Email ou mot de passe incorrect.<br><br>";
                    } elseif ($_GET['error'] == 2) {
                        echo "Veuillez remplir tous les champs.<br><br>";
                    }
                }
                ?>
                <div class="form-group">
                    <label for="mail">Adresse email :</label>
                    <input type="email" id="mail" name="mail" required>
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe :</label>
                    <input type="password" id="mdp" name="mdp" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="inscrit">Se connecter</button>
                </div>
            </form>

    </div>
</body>
</html>