let valid_form = {
    mdp: false,
    mail: false,
    pseudo: false,
    condition: false
}

function crypt(mdp, crypt) {
    if (document.querySelector(mdp) != null) {
        let value = document.querySelector(mdp).value;
        document.querySelector(crypt).value = md5(value);
    }
}

function verifi_mdp() {
    let mdp = document.querySelector("#register_mdp").value;
    let mdp2 = document.querySelector("#confirme").value;
    if (mdp === mdp2) {
        valid_form.mdp = true;
        document.querySelector("#confirme").classList = "";
    } else {
        valid_form.mdp = false;
        document.querySelector("#confirme").classList = "invalid";
    }
}

function verifi_mail() {
    let regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if (!regex.test(document.querySelector("#mail").value)) {
        valid_form.mail = false;
        document.querySelector("#mail").classList = "invalid";
    } else {
        valid_form.mail = true;
        document.querySelector("#mail").classList = "";
    }
}

function verifi_pseudo() {
    let pseudo = document.querySelector("#register_pseudo");
    if (pseudo.value.length < 2 || pseudo.value.length > 25) {
        valid_form.pseudo = false;
        pseudo.classList = "invalid";
    } else {
        valid_form.pseudo = true;
        pseudo.classList = "";
    }
}

function verifi_condition() {
    let condition = document.querySelector("#condition");
    if (condition.checked === true) {
        valid_form.condition = true;
        condition.classList = "";
    } else {
        valid_form.condition = false;
        condition.classList = "invalid";
    }
}

function anabled() {
    if (valid_form.mdp === true && valid_form.mail === true && valid_form.pseudo === true && valid_form.condition === true) {
        document.querySelector("#envoyer").disabled = false;
    } else {
        document.querySelector("#envoyer").disabled = true;
    }
}

crypt("#mdp", "#crypt");

document.querySelector("#connexion").addEventListener("keypress", function() {
    crypt("#mdp", "#crypt");
});

document.querySelector("#connexion").addEventListener("click", function() {
    crypt("#mdp", "#crypt");
});

crypt("#register_mdp", "#register_crypt");

document.querySelector("#register").addEventListener("keypress", function() {
    crypt("#register_mdp", "#register_crypt");
    verifi_mdp();
    verifi_mail();
    verifi_pseudo();
    verifi_condition();
    anabled();
});

document.querySelector("#register").addEventListener("click", function() {
    crypt("#register_mdp", "#register_crypt");
    verifi_mdp();
    verifi_mail();
    verifi_pseudo();
    verifi_condition();
    anabled();
});