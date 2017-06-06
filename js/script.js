if (document.querySelector("#mdp") != null) {
    let value = document.querySelector("#mdp").value;
    document.querySelector("#crypt").value = md5(value);
}

document.querySelector("#connexion").addEventListener("keypress", function() {
    if (document.querySelector("#mdp") != null) {
        let value = document.querySelector("#mdp").value;
        document.querySelector("#crypt").value = md5(value);
    }
});
document.querySelector("#register").addEventListener("keypress", function() {
    if (document.querySelector("#register_mdp") != null) {
        let value = document.querySelector("#register_mdp").value;
        document.querySelector("#register_crypt").value = md5(value);
    }
});
document.querySelector("#connexion").addEventListener("click", function() {
    if (document.querySelector("#mdp") != null) {
        let value = document.querySelector("#mdp").value;
        document.querySelector("#crypt").value = md5(value);
    }
});
document.querySelector("#register").addEventListener("click", function() {
    if (document.querySelector("#register_mdp") != null) {
        let value = document.querySelector("#register_mdp").value;
        document.querySelector("#register_crypt").value = md5(value);
    }
});