let passe1 = document.getElementById("passe1");
let passe2 = document.getElementById("passe2");
let verification = document.getElementById("verification");
let valider1 = document.getElementById("valider1");

function comparerMotDePasse() {
    if(passe1.value === passe2.value) {
        verification.innerHTML = "Mots de passe identiques";
    }
    else {
        verification.innerHTML = "Mots de passe différents !!!";
    }
}
passe2.oninput = comparerMotDePasse;

function passesDiffrents() {
    if(passe1.value !== passe2.value) {
        alert("Les mots de passe doivent etre identiques.");
    }
}
valider1.onclick = passesDiffrents;