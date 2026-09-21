<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Résultat de la recherche</title>
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
                            <a href="searchLivre.html">Rechercher un livre</a>
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
                    <button type="submit" name="searchLivre">🔍</button>
                </form>
            </div>
        </div>
    </header>

    <div class="container search-page">
        <h1>Résultat de la recherche</h1>

        <?php
        if (isset($_POST["searchLivre"])) {
            $con = mysqli_connect("localhost", "root", "", "bibliotheque");

            if (!$con) {
                die("Erreur de connexion à la base de données.");
            }

            mysqli_set_charset($con, "utf8");

            $titre = mysqli_real_escape_string($con, $_POST["titre"]);

            $requete = "SELECT livre.titre, livre.genre, livre.annee_publication, livre.stock, livre.couverture,
                               auteur.nom, auteur.prenom
                        FROM livre
                        JOIN auteur ON livre.id_auteur = auteur.id_auteur
                        WHERE livre.titre LIKE '%$titre%'
                        ORDER BY livre.titre";

            $resultat = mysqli_query($con, $requete);

            if (!$resultat) {
                die("Erreur dans la requête.");
            }

            $nb = mysqli_num_rows($resultat);

            if ($nb > 0) {
                echo "<p class='search-result-count'>" . $nb . " résultat(s) trouvé(s)</p>";

                if ($nb == 1) {
                    echo "<div class='single-result-wrapper'>";
                } else {
                    echo "<div class='books-grid'>";
                }

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
                echo "<div class='search-back-link'><a href='searchLivre.html'>← Faire une nouvelle recherche</a></div>";
            } else {
                echo "<p class='no-result'>Aucun livre trouvé.</p>";
                echo "<div class='search-back-link'><a href='searchLivre.html'>← Retour à la recherche</a></div>";
            }

            mysqli_free_result($resultat);
            mysqli_close($con);
        } else {
            echo "<p class='no-result'>Aucune recherche n’a été envoyée.</p>";
            echo "<div class='search-back-link'><a href='searchLivre.html'>← Retour à la recherche</a></div>";
        }
        ?>
    </div>
</body>
</html>