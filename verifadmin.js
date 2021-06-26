function verif(){
	var prenom= document.getElementById("name").value;
	var nom= document.getElementById("fname").value;
    var id1=document.getElementById("id1").value;
    var idu=document.getElementById("idu").value;
    var email=document.getElementById("email").value;
	var num=document.getElementById("num").value;
	var date=document.getElementById("date").value;
    var passw=document.getElementById("passw").value;
    var a='@';
	var errors="<ul>";
	var er=0;
    if(nom.length==0){
		errors+="<li>veuillez saisir un nom</li>";
		er=1;
	}
	else if(nom.charAt(0) < 'A' || nom.charAt(0)> 'Z'){
		//alert("Le nom doit commencer par une lettre majuscule");
		errors+="<li>Le nom doit commencer par une lettre majuscule</li>";
		er=1;
	}
    if(prenom.length==0){
		errors+="<li> veuillez saisir un prénom </li>";
		er=1;
	}
	else if(prenom.charAt(0) < 'A' || prenom.charAt(0)> 'Z'){
		//alert("Le prenom doit commencer par une lettre majuscule");
		errors+="<li>Le prenom doit commencer par une lettre majuscule</li>";
		er=1;
	}
    if(email.length==0){
		//alert("veuillez saisir une adresse email");
		errors+="<li> veuillez saisir une adresse email </li>";
		er=1;
	}
    else if 
        (email.substring(mail.indexof(a))!='esprit.tn')
        {
            errors+="<li> L'adresse email doit être celle de esprit </li>";
			er=1;
        }
    

	if(num.length !== 8){
		errors+="<li>Le numéro de téléphone doit contenir 8 chiffres</li>";
		er=1;
	}
    else if(passw.length ==0)
    {
      //  alert("Merci de saisir un mdp");
	  er=1;
    }
    
	if(date===""){
	//	alert("La date de naissance est obligatoire");
	er=1;
	}
	else{
		var today = new Date();
		var date= new Date(date);
		if(today.getFullYear()-date.getFullYear() < 18){
			errors+="<li>Vous n'êtes pas un adulte</li>";
			er=1;
		}
	}

	errors+="</ul>";
	document.getElementById("erreur").innerHTML=errors;
	if(er===1){
		return false;
	}
	return true;
}
