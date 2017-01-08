function informationsCorrecte(){
    /*
     But : Vérifie si les CodePromo et année ne sont pas vides
     */
    res=true;
    if(document.getElementById('codePromo').value==""){
        alert("Email non renseigné");
        res= false;
    }
    if(document.getElementById('annee').value==""){
        alert("Mot de passe non renseigné");
        res=false;
    }
    return res;
}

