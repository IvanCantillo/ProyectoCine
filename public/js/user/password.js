var pass1 = document.getElementById('pass_nueva');
var pass2 = document.getElementById('r_pass_nueva');
var error = document.getElementById('error');
var validar_btn = document.getElementById('validar');
var submit_btn = document.getElementById('update');

validar_btn.addEventListener("click", () => {
	
	if (pass1.value == pass2.value && pass1.value != "") {
		validar_btn.classList.add("d-none");
		submit_btn.classList.remove("d-none");
	}else{
		error.innerText = 'Las contraseñas no coinciden';
        setTimeout(() => {
            error.innerText = '';
		}, 3000);
		// console.log('object')
	}
});