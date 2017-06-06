<?php include("header.php"); ?>
<main>
<form></form>
    <?php
    if (isset($_POST['creer']) && !isset($_POST['truc'])) {
        if (isset($_POST["titre"]) && isset($_POST["article"])) {
            if (!is_dir("articles")) {
                mkdir("articles");
            }
            $newFile = fopen("articles/".$_POST["titre"].".txt", "w") or die ("Unable to open file!");
            fwrite($newFile, $_POST["article"]);
            fclose($newFile);
            echo '<h6>Votre article a été enregistré avec succès, vous allez etre redirigé vers le blog dans 3 secondes.<h6>';
        } else {
            echo "<h6>Il y a eu un probleme, tout est perdu. désolé.</h6>";
        }
    ?>
    <script LANGUAGE="JavaScript">
        setTimeout(function() {
            document.location.href="blog.php"
        }, 3000)
    </script>
    <?php
    }

    if (isset($_POST['creer']) && isset($_POST['truc'])) {
        if (isset($_POST["titre"]) && isset($_POST["article"])) {
            unlink("articles/".$_POST["truc"]);
            $newFile = fopen("articles/".$_POST["titre"].".txt", "w") or die ("Unable to open file!");
            fwrite($newFile, $_POST["article"]);
            fclose($newFile);
            echo '<h6>Votre article a été enregistré avec succès, vous allez etre redirigé vers le blog dans 3 secondes.<h6>';
        } else {
            echo "<h6>Il y a eu un probleme, tout est perdu. désolé.</h6>";
        }
    ?>
    <script LANGUAGE="JavaScript">
        setTimeout(function() {
            document.location.href="blog.php"
        }, 3000)
    </script>
    <?php
    }

    if (isset($_POST['supprimer'])) {
        unlink("articles/".$_POST["truc"]);
        echo "<h6>L'article a bien été supprimer, vous allez etre redirigé vers le blog dans 5 secondes.</h6>";
    ?>
    <script LANGUAGE="JavaScript">
        setTimeout(function() {
            document.location.href="blog.php"
        }, 3000)
    </script>
    <?php
    }

    if (isset($_POST['enregistrer'])) {
        if (isset($_POST["register_pseudo"]) && isset($_POST["register_mdp"])) {
            if (!is_dir("utilisateurs")) {
                mkdir("utilisateurs");
            }
            $newFile = fopen("utilisateurs/".$_POST["register_pseudo"].".txt", "w") or die ("Unable to open file!");
            fwrite($newFile, $_POST["register_crypt"]);
            fclose($newFile);
            echo $_POST["register_pseudo"];
            echo $_POST["register_crypt"];
            echo '<h6>Vous avez été enregistré avec succès, vous allez etre redirigé vers votre profil dans 3 secondes.<h6>';
            ?>
                <script LANGUAGE="JavaScript">
                    setTimeout(function() {
                    document.location.href="profil.php"
                    }, 3000)
                </script>
            <?php
        } else {
            echo "<h6>Il y a eu un probleme, tout est perdu. désolé.</h6>";
            ?>
                <script LANGUAGE="JavaScript">
                    setTimeout(function() {
                    document.location.href="register.php"
                }, 3000)
                </script>
            <?php
        }
    
    }

    if (isset($_POST['connexion'])) {
        echo $_POST["crypt"];
        if (isset($_POST["pseudo"]) && isset($_POST["mdp"])) {
            $utilisateurs = opendir('utilisateurs/'); 
            while($pseudo = readdir($utilisateurs)) {
                if(pathinfo($pseudo, PATHINFO_FILENAME) == $_POST["pseudo"]) {
		            $file = fopen ("utilisateurs/".$pseudo, "r");
                    $mdp = fgets ($file, 25500);
                    fclose ($file);
                    if($mdp == $_POST["crypt"]) {
                        header('Location: profil.php');
                        exit();
                    } else {
                        echo "Mot de passe incorrect !";
                        exit();
                    }
                }
            }
            echo "Pseudo innexistant !";
        }
    }

    ?>
    
</main>
<?php include("footer.html"); ?>