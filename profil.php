<?php 
$page = "profil";
include("header.php"); 
?>
<main>

    <p>Ton pseudo est <?php echo $_SESSION["user"]; ?> !</p>

</main>

<?php include("footer.html"); ?>