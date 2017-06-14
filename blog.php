
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
                    <h1><?php echo $article->titre; ?></h1>
                    <p><?php echo $article->article; ?></p>
                    <p>Ecris par <?php echo $article->utilisateur." le ".$article->date.", à ".$article->heure."."; ?></p>
                    <?php
                    if(isset($_SESSION["connect"]) && $_SESSION["connect"] == true && $article->utilisateur == $_SESSION["user"]) {
                    ?>
                    <form action="controle.php" method="POST">
                        <input type="hidden" value="<?php echo $titre; ?>" name="titre"/>
                        <input type="submit" name="supprimer" value="supprimer"/>
                    </form>
                    <form action="create.php" method="POST">
                        <input type="hidden" value="<?php echo $titre; ?>" name="titre"/>
                        <input type="submit" name="modifier" value="modifier"/>
                    </form>
                    <?php } ?>
                </article>
    <?php
            }
    
        }
    ?>
</main>
<?php include("footer.html"); ?>