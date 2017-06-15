<?php 
$page = "profil";
include("header.php"); 
?>
<main>

    <p>Ton pseudo est <?php echo $_SESSION["user"]; ?> !</p>
    <img src="https://vignette1.wikia.nocookie.net/uncyclopedia/images/1/15/CaptainobviousChooseOption.jpg/revision/latest/scale-to-width-down/200?cb=20070526081820"/>

</main>

<?php include("footer.html"); ?>