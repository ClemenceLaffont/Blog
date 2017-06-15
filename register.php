
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
                <label for="mail">Email*</label>
                <input type="email" id="mail" name="mail" />
                <section>
                    <div>
                        <label class="avatar" style="background-position:0px 0px;" for="avatar1"></label>
                        <input type="radio" name="avatar" value="0px 0px" id="avatar1" checked="checked"/>
                    </div>
                    <div>
                        <label class="avatar" style="background-position:50px 0px;" for="avatar2"></label>
                        <input type="radio" name="avatar" value="50px 0px" id="avatar2" />
                    </div>
                    <div>
                        <label class="avatar" style="background-position:0px 50px;" for="avatar3"></label>
                        <input type="radio" name="avatar" value="0px 50px" id="avatar3" />
                    </div>
                    <div>
                        <label class="avatar" style="background-position:100px 0px;" for="avatar4"></label>
                        <input type="radio" name="avatar" value="100px 0px" id="avatar4" />
                    </div>
                    <div>
                        <label class="avatar" style="background-position:0px 100px;" for="avatar5"></label>
                        <input type="radio" name="avatar" value="0px 100px" id="avatar5" />
                    </div>
                    <div>
                        <label class="avatar" style="background-position:50px 50px;" for="avatar6"></label>
                        <input type="radio" name="avatar" value="50px 50px" id="avatar6" />
                    </div>
                    <div>
                        <label class="avatar" style="background-position:100px 100px;" for="avatar7"></label>
                        <input type="radio" name="avatar" value="100px 100px" id="avatar7" />
                    </div>
                    <div>
                        <label class="avatar" style="background-position:0px 150px;" for="avatar8"></label>
                        <input type="radio" name="avatar" value="0px 150px" id="avatar8" />
                    </div>
                    <div>
                        <label class="avatar" style="background-position:0px 400px;" for="avatar9"></label>
                        <input type="radio" name="avatar" value="0px 400px" id="avatar9" />
                    </div>
                    <div>
                        <label class="avatar" style="background-position:50px 250px;" for="avatar10"></label>
                        <input type="radio" name="avatar" value="50px 250px" id="avatar10" />
                    </div>
                </section>
                <div>
                    <input type="checkbox" id="condition" name="condition" />
                    <label for="condition">J'accèpte les conditions utilisateurs.*</label>
                </div>
                <input type="submit" name="enregistrer" value="Envoyer" id="envoyer" class="myButton" />
            </form>
        </fieldset>
    </main>
<?php include("footer.html"); ?>