<?php include("header.php"); ?>
<main>
    <?php
    if (isset($_POST['creer'])) {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($post['oldtitre'])) {
            if (isset($post["titre"]) && isset($post["article"])) {
                $json = file_get_contents("articles/".$post['oldtitre']);
                $article = json_decode($json);
                include_once 'class/articles.php';
                $obj = new Articles($article->utilisateur, $post['titre'], $post['article'], $article->date, $article->heure);
                $newjson = json_encode($obj);
                $newFile = fopen("articles/".$post['oldtitre'].".json", "w");
                fwrite($newFile, $newjson);
                fclose($newFile);
                echo '<h6>Votre article a été enregistré avec succès, vous allez etre redirigé vers le blog dans 3 secondes.<h6>';
            } 
        } else if (!isset($post['oldtitre'])) {
            if (isset($post["titre"]) && isset($post["article"])) {
                if (!is_dir("articles")) {
                    mkdir("articles");
                }
                include_once 'class/articles.php';
                $obj = new Articles($_SESSION['user'], $post['titre'], $post['article'], date("d-m-Y"), date("H:i:s"));
                $newjson = json_encode($obj);
                $newFile = fopen("articles/".date("d-m-Y").date("H:i:s").".json", "w");
                fwrite($newFile, $newjson);
                fclose($newFile);
                echo '<h6>Votre article a été enregistré avec succès, vous allez etre redirigé vers le blog dans 3 secondes.<h6>';
            }
    ?>
    <script LANGUAGE="JavaScript">
        setTimeout(function() {
            document.location.href="blog.php";
        }, 3000);
    </script>
    <?php
        } else {
            echo "<h6>Il y a eu un probleme, tout est perdu. désolé.</h6>";
        }
    }


    if (isset($_POST['supprimer'])) {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        unlink("articles/".$post["titre"]);
        echo "<h6>L'article a bien été supprimer, vous allez etre redirigé vers le blog dans 5 secondes.</h6>";
    ?>
    <script LANGUAGE="JavaScript">
        setTimeout(function() {
            document.location.href="blog.php";
        }, 3000);
    </script>
    <?php
    }

    if (isset($_POST['enregistrer'])) {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($post["register_pseudo"]) && isset($post["register_crypt"])) {
            if (!is_dir("utilisateurs")) {
                mkdir("utilisateurs");
            }
            include_once 'class/utilisateurs.php';
            $obj = new Utilisateurs($post["register_pseudo"], $post["register_crypt"], $post['mail'], "avatar1");
            $json = json_encode($obj);
            $newFile = fopen("utilisateurs/".$post["register_pseudo"].".json", "w") or die ("Unable to open file!");
            fwrite($newFile, $json);
            fclose($newFile);
            echo '<h6>Vous avez été enregistré avec succès, vous allez etre redirigé vers votre profil dans 3 secondes.<h6>';
            $_SESSION["connect"] = true;
            $_SESSION["user"] = $post["register_pseudo"];
            ?>
                <script LANGUAGE="JavaScript">
                    setTimeout(function() {
                    document.location.href="profil.php";
                    }, 3000);
                </script>
            <?php
        } else {
            echo "<h6>Il y a eu un probleme, tout est perdu. désolé.</h6>";
            ?>
                <script LANGUAGE="JavaScript">
                    setTimeout(function() {
                    document.location.href="register.php";
                }, 3000);
                </script>
            <?php
        }
    
    }

    if (isset($_POST['connexion'])) {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($post["pseudo"]) && isset($post["crypt"])) {
            $pseudo = $post["pseudo"];
            $mdp = md5($post["crypt"]);
            $utilisateurs = opendir('utilisateurs/'); 
            while($utilisateur = readdir($utilisateurs)) {
                if(pathinfo($utilisateur, PATHINFO_FILENAME) == $pseudo) {
                    $json = file_get_contents("utilisateurs/".$utilisateur);
                    $user = json_decode($json);
                    if($user->mdp == $mdp) {
                        $_SESSION["connect"] = true;
                        $_SESSION["user"] = $pseudo;
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

    if (isset($_POST['deconnexion'])) {
        $_SESSION["connect"] = false;
        $_SESSION["user"] = "";
        header('Location: blog.php');
    }
    ?>
    
</main>
<?php include("footer.html"); 
