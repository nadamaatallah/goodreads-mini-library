PROJET WEB ET BASE DE DONNÉES
Bibliothèque numérique

Nom du projet :
Site web de gestion d’une bibliothèque numérique

Description :
Ce projet a été réalisé dans le cadre d’un projet universitaire en HTML, CSS, PHP et SQL.
Il s’agit d’un site web permettant de représenter une bibliothèque numérique connectée à une base de données relationnelle.

Le site permet notamment de :
- consulter la page d’accueil de la bibliothèque ;
- afficher une page de présentation ;
- consulter le catalogue des livres ;
- rechercher un livre ;
- consulter les adhérents et les emprunts ;
- ajouter un livre dans la base de données.

Technologies utilisées :
- HTML
- CSS
- PHP
- MySQL
- XAMPP / phpMyAdmin

Contenu du projet :
- index.html : page d’accueil
- presentation.html : page de présentation
- livres.php : affichage du catalogue des livres
- searchLivre.html / searchLivre.php : recherche d’un livre
- adherents.php : affichage des adhérents / emprunts
- ajouterLivre.php : ajout d’un livre dans la base
- style.css : feuille de style principale
- bibliotheque.sql : script SQL de création, de peuplement et de requêtes
- MCD : modèle conceptuel de données
- MLD : modèle logique de données
- dossier images : images et couvertures utilisées dans le site

Base de données :
Nom de la base : bibliotheque

Tables principales :
- auteur
- adherent
- livre
- emprunt

Fonctionnalités principales :
1. Affichage des livres avec auteur, genre, année, stock et couverture
2. Recherche d’un livre
3. Ajout d’un nouveau livre via un formulaire
4. Consultation des adhérents
5. Suivi des emprunts

Installation et exécution :
1. Ouvrir XAMPP
2. Démarrer Apache et MySQL
3. Ouvrir phpMyAdmin
4. Créer une base de données nommée bibliotheque
5. Importer le fichier bibliotheque.sql
6. Placer le dossier du projet dans le dossier htdocs de XAMPP
7. Ouvrir le navigateur
8. Accéder au projet via :
   http://localhost/nom_du_dossier/

Page de démarrage :
index.html

Remarque sur le design CSS :
L’apparence visuelle du site est inspirée de l’interface de la plateforme Goodreads.

Site de référence :
https://www.goodreads.com/

Pour reproduire certains choix de style, je me suis appuyé sur la feuille CSS suivante :
https://s.gr-assets.com/assets/gr/application-95d7e44f22212374ee76e3c975b4e7dd.css

Cette feuille a été repérée à partir de l’outil Inspect Element sur la page Goodreads, puis adaptée au contexte de ce projet de bibliothèque.

Le contenu du projet, la structure des pages, la base de données, les fonctionnalités, ainsi que l’organisation générale du site ont été réalisés dans le cadre du projet universitaire.

Fichiers à vérifier avant dépôt :
- toutes les pages HTML / PHP fonctionnent
- le fichier CSS est bien présent
- les images sont bien incluses dans le dossier du projet
- le fichier SQL s’importe sans erreur
- le MCD et le MLD sont inclus
- le site s’affiche correctement dans le navigateur

Auteur :
Katr Nada Maatallah
