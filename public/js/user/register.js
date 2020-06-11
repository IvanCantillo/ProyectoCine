async function get_tarjetas() {
  var formData = new FormData();
  formData.append("tarjetas", "si hay");

  const response = await fetch("http://localhost/Proyecto_cine/user/tarjetas", {
    method: "POST",
    headers: {
      Accept: "application/json",
    },
    body: formData,
  });
  return await response.json();
}

async function register(data) {
  const response = await fetch("http://localhost/Proyecto_cine/user/signup", {
    method: "POST",
    headers: {
      Accept: "application/json",
    },
    body: data,
  });
  return await response.json();
}

function generar_tarjeta() {
  let codigo = "";
  let existe = true;
  while (existe) {
    for (let i = 0; i < 11; i++) {
      codigo += Math.round(Math.random() * 9);
    }
    existe = array.some((valor) => valor == codigo);
  }
  return codigo;
}

var array = [];
// ---------- VIP ----------
const seccion_vip = document.getElementById("seccion_vip");
const ser_vip = document.getElementById("ser_vip");
var tarjeta = document.getElementById("tarjeta");
const nacimiento = document.getElementById("nacimiento");

ser_vip.addEventListener("click", async () => {
  if (ser_vip.checked) {
    seccion_vip.classList.remove("d-none");
    var res = await get_tarjetas();
    res.forEach((element) => {
      let existe = false;
      existe = array.some((valor) => valor == element["tarjeta"]);
      if (!existe) {
        array.push(element["tarjeta"]);
      }
    });
    tarjeta.value = generar_tarjeta();
    nacimiento.setAttribute("required", "");
  } else {
    seccion_vip.className = "d-none";
    nacimiento.removeAttribute("required");
    tarjeta.value = "";
    nacimiento.value = "";
  }
});

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
      window.location = "http://localhost/Proyecto_cine/inicio/";
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
