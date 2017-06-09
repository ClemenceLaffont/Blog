
<?php 
$page = "enregistrer";
include("header.php"); 
?>
    <main>
        <fieldset>
            <legend>Inscription</legend>
            <form method="POST" action="controle.php" id="register">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="register_pseudo" name="register_pseudo" placeholder="Exemple42" required/>
                <label for="mdp">Mot de passe</label>
                <input type="password" id="register_mdp" name="register_mdp" required/>
                <input type="hidden" name="register_crypt" id="register_crypt" />
                <label for="confirme">Confirmation du mot de passe</label>
                <input type="password" id="confirme" name="confirme" required/>
                <label for="mail">Email</label>
                <input type="email" id="mail" name="mail" />
                <label for="condition">J'accèpte les conditions utilisateurs.</label>
                <input type="reset" name="reset" value="Annuler" />
                <input type="submit" name="enregistrer" value="Envoyer" id="envoyer" />
            </form>
        </fieldset>
    </main>
<?php include("footer.html"); ?>