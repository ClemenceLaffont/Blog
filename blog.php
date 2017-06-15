
<?php 
$page = "blog";
include("header.php"); 
?>
<main>
    <?php
        $articles = opendir('articles/'); 
        while($titre = readdir($articles)) {
	        if($titre[0] != '.' && !is_dir("articles/".$titre)) {
		        $json = file_get_contents("articles/".$titre);
                $article = json_decode($json);
	?>
                <article>
                    <section class="hautArticle">
                        <div style="background-position:<?php echo $article->avatar; ?>;" class="avatar"></div>
                        <h2><?php echo $article->utilisateur; ?></h2>
                        <section>
                            <?php
                            if(isset($_SESSION["connect"]) && $_SESSION["connect"] == true && $article->utilisateur == $_SESSION["user"]) {
                            ?>
                                <form action="controle.php" method="POST">
                                    <input type="hidden" value="<?php echo $titre; ?>" name="titre"/>
                                    <input type="submit" name="supprimer" value="supprimer" class="myButton" />
                                </form>
                                <form action="create.php" method="POST">
                                    <input type="hidden" value="<?php echo $titre; ?>" name="titre"/>
                                    <input type="submit" name="modifier" value="modifier" class="myButton" />
                                </form>
                            <?php } ?>
                        </section>
                    </section>
                    <section class="milieuArticle">
                        <h1><?php echo $article->titre; ?></h1>
                        <p><?php echo $article->article; ?></p>
                        <h4>Ecris par <?php echo $article->utilisateur." le ".$article->date.", à ".$article->heure; ?>.</h4>
                    </section>
                    <section class="basArticle">
                        <h4> Dernière modification le <?php echo $article->newdate.", à ".$article->newheure; ?>.</h4>
                        
                    </section>
                </article>
    <?php
            }
    
        }
    ?>
</main>
<?php include("footer.html"); ?>