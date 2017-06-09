<?php 
$page = "create";
include("header.php"); 

if (isset($_POST['modifier'])) {
    $json = file_get_contents("articles/".$_POST['titre']);
    $article = json_decode($json);
}
?>
<main>
    <form method="post" action="controle.php">
        <input type="text" name="titre" required 
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
        <input type="button" id="bold" value="G" style="font-weight: bold;" onclick="commande('bold');" />
        <div name="article" id="article" contentEditable></div>
        <?php } ?>
        <input type="submit" name="creer" value="Poster"/>
    </form>
</main>
<?php include("footer.html"); ?>