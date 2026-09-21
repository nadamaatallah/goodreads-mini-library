<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Ajouter un livre</title>
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
        <h1>Ajouter un livre</h1>
        <p>Ajoutez un nouvel ouvrage au catalogue de la bibliothèque.</p>

        <?php
        $con = mysqli_connect("localhost", "root", "", "bibliotheque");

        if (!$con) {
            die("Erreur de connexion à la base de données.");
        }

        mysqli_set_charset($con, "utf8");

        $message = "";

        if (isset($_POST["ajouterLivre"])) {
            $titre = trim($_POST["titre"]);
            $genre = trim($_POST["genre"]);
            $annee_publication = trim($_POST["annee_publication"]);
            $stock = trim($_POST["stock"]);
            $id_auteur = trim($_POST["id_auteur"]);
            $couverture = trim($_POST["couverture"]);

            if (!empty($titre) && !empty($genre) && !empty($annee_publication) && $stock !== "" && !empty($id_auteur)) {
                $requeteAjout = "INSERT INTO livre (titre, genre, annee_publication, stock, id_auteur, couverture)
                                 VALUES (?, ?, ?, ?, ?, ?)";

                $stmt = mysqli_prepare($con, $requeteAjout);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "ssiiis", $titre, $genre, $annee_publication, $stock, $id_auteur, $couverture);

                    if (mysqli_stmt_execute($stmt)) {
                        $message = "<p>Livre ajouté avec succès.</p>";
                    } else {
                        $message = "<p>Erreur lors de l'ajout du livre.</p>";
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    $message = "<p>Erreur dans la préparation de la requête.</p>";
                }
            } else {
                $message = "<p>Veuillez remplir tous les champs obligatoires.</p>";
            }
        }

        echo $message;

        $requeteAuteurs = "SELECT id_auteur, nom, prenom FROM auteur ORDER BY nom, prenom";
        $resultatAuteurs = mysqli_query($con, $requeteAuteurs);

        if (!$resultatAuteurs) {
            die("Erreur dans la récupération des auteurs.");
        }
        ?>

        <form action="ajouterLivre.php" method="POST">
            <p>
                <label for="titre">Titre :</label><br>
                <input type="text" name="titre" id="titre" required>
            </p>

            <p>
                <label for="genre">Genre :</label><br>
                <input type="text" name="genre" id="genre" required>
            </p>

            <p>
                <label for="annee_publication">Année de publication :</label><br>
                <input type="number" name="annee_publication" id="annee_publication" required>
            </p>

            <p>
                <label for="stock">Stock :</label><br>
                <input type="number" name="stock" id="stock" min="0" required>
            </p>

            <p>
                <label for="id_auteur">Auteur :</label><br>
                <select name="id_auteur" id="id_auteur" required>
                    <option value="">-- Choisir un auteur --</option>
                    <?php
                    while ($auteur = mysqli_fetch_assoc($resultatAuteurs)) {
                        echo "<option value='" . htmlspecialchars($auteur["id_auteur"]) . "'>"
                            . htmlspecialchars($auteur["prenom"] . " " . $auteur["nom"])
                            . "</option>";
                    }
                    ?>
                </select>
            </p>

            <p>
                <label for="couverture">Chemin de la couverture :</label><br>
                <input type="text" name="couverture" id="couverture" placeholder="images/covers/monlivre.jpg">
            </p>

            <p>
                <button type="submit" name="ajouterLivre">Ajouter le livre</button>
            </p>
        </form>

        <?php
        mysqli_free_result($resultatAuteurs);
        mysqli_close($con);
        ?>
    </div>
</body>
</html>