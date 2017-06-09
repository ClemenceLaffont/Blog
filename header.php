<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Candal|Indie+Flower|Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/md5.js"></script>
    
    <title>Document</title>
</head>
<?php session_start(); ?>
<body>
    <header>
        <div>
            <img src="img/logo.png" />
            <h1>Un blog de fou !</h1>
        </div>
        <nav>
            <?php
            if(isset($_SESSION["connect"]) && $_SESSION["connect"] == true) {
            ?>
            <a href="create.php"
            <?php 
                if (isset($page) && $page == "create") {
                    echo ' class="underline" ';
                }
            ?>
            >Créer un article</a>
            <?php } ?>
            <a href="blog.php"
            <?php 
                if (isset($page) && $page == "blog") {
                    echo ' class="underline" ';
                }
            ?>
            >Le blog</a>
            <?php
            if(isset($_SESSION["connect"]) && $_SESSION["connect"] == true) {
            ?>
            <a href="profil.php"
            <?php 
                if (isset($page) && $page == "profil") {
                    echo ' class="underline" ';
                }
                echo '>'.$_SESSION["user"];
            ?></a>
            <form method="post" action="controle.php">
                <input type="submit" name="deconnexion" value="deconnexion" />
            </form>
            <?php } else { ?>
            <a href="register.php"
            <?php 
                if (isset($page) && $page == "enregistrer") {
                    echo ' class="underline" ';
                }
            ?>
            >S'enregistrer</a>
            <form action="controle.php" method="post" id="connexion">
                <section>
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" require/>
                </section>
                <section>
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" require/>
                    <input type="hidden" name="crypt" id="crypt" />
                </section>
                <input type="submit" name="connexion" value="connexion" />
            </form>
            <?php } ?>
        </nav>
    </header>