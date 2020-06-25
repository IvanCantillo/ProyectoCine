import { URL_BASE } from '../parametros.js';

async function register(data) {
  const response = await fetch( URL_BASE + "user/signup", {
    method: "POST",
    headers: {
      Accept: "application/json",
    },
    body: data,
  });
  return await response.json();
}

// ---------- REGISTER ----------
const form_register = document.getElementById("form_register");
const nombre = document.getElementById('nombre');
const apellido = document.getElementById('apellido');
const telefono = document.getElementById('telefono');
const email = document.getElementById('email');
const password = document.getElementById("password");
const password_confirm = document.getElementById("passsword_confirm");

// --- VARS ERRORS- ---
const email_error = document.getElementById("email_error");
const password_error = document.getElementById("password_error");

form_register.addEventListener("submit", async (e) => {
  e.preventDefault();
  if( nombre.value  == '' ){ return nombre.setAttribute('required', '');}
  if( apellido.value  == '' ){ return apellido.setAttribute('required', '');}
  if( telefono.value  == '' ){ return telefono.setAttribute('required', '');}
  if( email.value  == '' ){ return email.setAttribute('required', '');}
  if( password.value  == '' ){ return password.setAttribute('required', '');}
  if( password_confirm.value  == '' ){ return password_confirm.setAttribute('required', '');}

  if (password.value == password_confirm.value) {
    let data = new FormData(form_register);
    const res = await register(data);
    if (res.message == "ok") {
      window.location =  URL_BASE + "inicio/";
    }else {
        email_error.innerText = res.message;
        setTimeout(() => {
          email_error.innerText = '';
        }, 3000);
    }
  } else {
    password_error.innerText = "Las contraseñas no coinciden";
    password_confirm.value = "";
    setTimeout(() => {
      password_error.innerText = "";
    }, 3000);
  }
});
