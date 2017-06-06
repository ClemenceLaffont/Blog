
<?php 
$page = "enregistrer";
include("header.php"); 
?>
    <main>
        <fieldset>
            <legend>Inscription</legend>
            <form method="POST" action="controle.php" id="register">

                <label for="pseudo">Pseudo*</label>
                <input type="text" id="register_pseudo" name="register_pseudo" placeholder="Exemple42" required/>
                <label for="mdp">Mot de passe*</label>
                <input type="password" id="register_mdp" name="register_mdp" required/>
                <input type="hidden" name="register_crypt" id="register_crypt" />
                <label for="confirme">Confirmation du mot de passe*</label>
                <input type="password" id="confirme" name="confirme" required/>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Nom" />
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" />
                <label for="mail">Email*</label>
                <input type="email" id="mail" name="mail" />
                <label for="num">Numéro de téléphone</label>
                <input type="number" id="num" name="num" />

                <input type="checkbox" id="condition" name="condition" />
                <label for="condition">J'accèpte les conditions utilisateurs.*</label>
                <input type="reset" name="reset" value="Annuler" />
                <input type="submit" name="enregistrer" value="Envoyer" />

            </form>
        </fieldset>
    </main>
<?php include("footer.html"); ?>