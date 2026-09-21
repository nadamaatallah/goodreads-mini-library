<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Adhérents et emprunts</title>
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
        <h1>Adhérents et emprunts en cours</h1>
        <p>Consultez la liste des adhérents inscrits ainsi que les livres actuellement empruntés.</p>

        <?php
        $con = mysqli_connect("localhost", "root", "", "bibliotheque");

        if (!$con) {
            die("Erreur de connexion à la base de données.");
        }

        mysqli_set_charset($con, "utf8");

        echo "<h2>Liste des adhérents</h2>";

        $requete1 = "SELECT nom, prenom, email, date_inscription
                     FROM adherent
                     ORDER BY nom, prenom";

        $resultat1 = mysqli_query($con, $requete1);

        if (!$resultat1) {
            die("Erreur dans la requête des adhérents.");
        }

        if (mysqli_num_rows($resultat1) > 0) {
            echo "<table>";
            echo "<tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Date d'inscription</th></tr>";

            while ($ligne = mysqli_fetch_assoc($resultat1)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($ligne['nom']) . "</td>";
                echo "<td>" . htmlspecialchars($ligne['prenom']) . "</td>";
                echo "<td>" . htmlspecialchars($ligne['email']) . "</td>";
                echo "<td>" . htmlspecialchars($ligne['date_inscription']) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='no-result'>Aucun adhérent enregistré.</p>";
        }

        mysqli_free_result($resultat1);

        echo "<h2>Emprunts en cours</h2>";

        $requete2 = "SELECT adherent.nom, adherent.prenom, livre.titre, emprunt.date_emprunt, emprunt.date_retour_prevue
                     FROM emprunt
                     JOIN adherent ON emprunt.id_adherent = adherent.id_adherent
                     JOIN livre ON emprunt.id_livre = livre.id_livre
                     WHERE emprunt.date_retour IS NULL
                     ORDER BY emprunt.date_retour_prevue ASC";

        $resultat2 = mysqli_query($con, $requete2);

        if (!$resultat2) {
            die("Erreur dans la requête des emprunts.");
        }

        if (mysqli_num_rows($resultat2) > 0) {
            echo "<table>";
            echo "<tr><th>Nom</th><th>Prénom</th><th>Livre</th><th>Date d'emprunt</th><th>Retour prévu</th></tr>";

            while ($ligne = mysqli_fetch_assoc($resultat2)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($ligne['nom']) . "</td>";
                echo "<td>" . htmlspecialchars($ligne['prenom']) . "</td>";
                echo "<td>" . htmlspecialchars($ligne['titre']) . "</td>";
                echo "<td>" . htmlspecialchars($ligne['date_emprunt']) . "</td>";
                echo "<td>" . htmlspecialchars($ligne['date_retour_prevue']) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='no-result'>Aucun emprunt en cours.</p>";
        }

        mysqli_free_result($resultat2);
        mysqli_close($con);
        ?>
    </div>
</body>
</html>