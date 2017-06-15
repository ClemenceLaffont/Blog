<?php 
$page = "create";
include("header.php"); 

if (isset($_POST['modifier'])) {
    $json = file_get_contents("articles/".$_POST['titre']);
    $article = json_decode($json);
}
?>
<main>
    <form method="post" action="controle.php" id="create">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" required 
        <?php
            if (isset($article)) {
                    echo 'value="'.$article->titre.'"';
            }
        ?>
        />
        <?php
            if (isset($article)) {
                echo '<textarea name="article" id="article" cols="30" rows="10" required>'.$article->article.'</textarea>';
                echo '<input type="hidden" value="'.$_POST['titre'].'" name="oldtitre"/>';
            } else {
        ?>
        <label for="article">Article</label>
        <textarea name="article" id="article"></textarea>
        <?php } ?>
        <input type="submit" name="creer" value="Poster" class="myButton" />
    </form>
</main>
<?php include("footer.html"); ?>