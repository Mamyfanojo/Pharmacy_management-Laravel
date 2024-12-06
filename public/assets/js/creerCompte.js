let nom = document.getElementById('nom');
let prenom = document.getElementById('prenom');
let password = document.getElementById('password');
let confirmation = document.getElementById('confirmation');
let bouton = document.getElementById('bouton');
let myForm = document.getElementById('myForm');

bouton.addEventListener('click', function(e){
    e.preventDefault();
    let regexNom = /^[a-zA-Z-\s]+$/;

    if ((nom.value == "") || (prenom.value == "") || (password.value == "") || (confirmation.value == "")){
       alert('remplir les formulaires correctement')
    }
    
    if (password.value != confirmation.value){
        alert('les mots de passe ne sont pas identiques')
    }

    if (regexNom.test(nom.value) == false || regexNom.test(prenom.value) == false){
        alert('Veuillez entrer le Nom ou Prenom')
    }
     

    nom.value ="";
    prenom.value ="";
    password.value ="";
    confirmation.value ="";
});
