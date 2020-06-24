var pass1 = document.getElementById('pass_nueva');
var pass2 = document.getElementById('r_pass_nueva');

var validar_btn = document.getElementById('validar');
var submit_btn = document.getElementById('update');

validar_btn.addEventListener("click", () => {
	
	if (pass1.value == pass2.value && pass1.value != "") {

		validar_btn.classList.add("d-none");
		submit_btn.classList.remove("d-none");
		
	}else{
		setTimeout(() => {
            document.getElementById('error').classList.remove("d-none");
        }, 1000);

        setTimeout(() => {
            document.getElementById('error').classList.add("d-none");
        }, 3000);


	}
});