const pwpField = document.querySelector(".form input[type='password']");
const toggleBtn = document.querySelector(".form .field i");

// Affiche le mot de passe
toggleBtn.onclick = ()=>{
	if (pwpField.type == 'password') {
		pwpField.type = 'text';
		toggleBtn.classList.add("active");
	}else{
		pwpField.type = 'password';
		toggleBtn.classList.remove("active");
	}
}