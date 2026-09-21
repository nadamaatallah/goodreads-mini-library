<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Catalogue des livres</title>
    <link rel="stylesheet" media="screen" href="style.css">
</head>
<body>
    <header class="goodreads-header">
        <div class="goodreads-topbar">
            <div class="site-logo">Bibliothèque</div>

            <nav class="main-nav">
                <a href="index.html">Accueil</a>
                <a href="presentation.html">Présentation</a>

                <div class="dropdown">
                    <a href="livres.php" class="dropdown-toggle">Catalogue ▾</a>
                    <div class="dropdown-menu">
                        <div class="dropdown-column">
                            <h4>Découvrir</h4>
                            <a href="livres.php">Tous les livres</a>
                            <a href="searchLivre.php">Rechercher un livre</a>
                            <a href="ajouterLivre.php">Ajouter un livre</a>
                            <a href="adherents.php">Emprunts en cours</a>
                        </div>
                        <div class="dropdown-column">
                            <h4>Genres</h4>
                            <a href="livres.php">Romans</a>
                            <a href="livres.php">Philosophie</a>
                            <a href="livres.php">Roman philosophique</a>
                            <a href="livres.php">Philosophie politique</a>
                        </div>
                    </div>
                </div>

                <a href="adherents.php">Adhérents</a>
            </nav>

            <div class="header-search">
                <form action="searchLivre.php" method="POST">
                    <input type="text" name="titre" placeholder="Rechercher un livre">
                    <button type="submit" name="searchLivre"></button>
                </form>
            </div>
        </div>
    </header>

    <div class="container">
        <h1>Catalogue des livres</h1>
        <p>Découvrez les ouvrages disponibles dans notre bibliothèque, avec leurs auteurs, genres et couvertures.</p>

        <?php
        $con = mysqli_connect("localhost", "root", "", "bibliotheque");

        if (!$con) {
            die("Erreur de connexion à la base de données.");
        }

        mysqli_set_charset($con, "utf8");

        $requete = "SELECT livre.titre, livre.genre, livre.annee_publication, livre.stock, livre.couverture,
                           auteur.nom, auteur.prenom
                    FROM livre
                    JOIN auteur ON livre.id_auteur = auteur.id_auteur
                    ORDER BY livre.titre";

        $resultat = mysqli_query($con, $requete);

        if (!$resultat) {
            die("Erreur dans la requête SQL.");
        }

        echo "<div class='books-grid'>";

        while ($ligne = mysqli_fetch_assoc($resultat)) {
            $image = !empty($ligne['couverture']) ? $ligne['couverture'] : 'images/covers/default.jpg';
            $auteur = trim($ligne['prenom'] . ' ' . $ligne['nom']);

            echo "<div class='book-card'>";
            echo "<img class='book-cover' src='" . htmlspecialchars($image) . "' alt='Couverture de " . htmlspecialchars($ligne['titre']) . "'>";
            echo "<h3>" . htmlspecialchars($ligne['titre']) . "</h3>";
            echo "<p><strong>Auteur :</strong> " . htmlspecialchars($auteur) . "</p>";
            echo "<p><strong>Genre :</strong> " . htmlspecialchars($ligne['genre']) . "</p>";
            echo "<p><strong>Année :</strong> " . htmlspecialchars($ligne['annee_publication']) . "</p>";
            echo "<p><strong>Stock :</strong> " . htmlspecialchars($ligne['stock']) . "</p>";
            echo "</div>";
        }

        echo "</div>";

        mysqli_free_result($resultat);
        mysqli_close($con);
        ?>
    </div>
</body>
</html>