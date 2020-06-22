import { URL_BASE } from '../parametros.js';

async function getTarjeta( data ) {
  let response = await fetch(URL_BASE + 'user/tarjeta', {
      method: 'POST',
      headers: {
          Accept: "application/json",
      },
      body: data
  });
  return response.json();
}

const sillas_seleccionadas = document.getElementById("sillas_seleccionadas");
const sillas = document.getElementsByClassName("silla");
const valor = document.getElementById("valor");
const total = document.getElementById("total");
const descuento = document.getElementById("descuento");
const descuento_tarjeta = document.getElementById("descuento_tarjeta");
var vip = false;

const valor_silla = 15000;
const descuento_sillas = 3000;
var descuento_tarjeta_vip = valor_silla * 0.4;
var contador_boletas = 0;
var sillas_compradas = {};
const btn_comprar = document.getElementById("comprar");

// Evento para cada silla.
for (var i = 0; i < sillas.length; i++) {
    sillas[i].onclick = function () {
    // console.log( contador_boletas )
    if (sillas_compradas[this.getAttribute("id")] == this.getAttribute("id")) {
      document.getElementById(this.getAttribute("id")).className = "text-primary ml-3";
      delete sillas_compradas[this.getAttribute("id")];
      sillas_seleccionadas.removeChild(
        document.getElementById(`${this.getAttribute("id")}_agregada`)
      );
      contador_boletas--;
    } else {
      sillas_seleccionadas.innerHTML += `<li id="${this.getAttribute("id")}_agregada" class="list-group-item"> <i class="fas fa-couch"></i> ${this.getAttribute("id")} </li>`;
      document.getElementById(this.getAttribute("id")).className = "text-success ml-3";
      sillas_compradas[this.getAttribute("id")] = this.getAttribute("id");
      contador_boletas++;
    }
    var subValor = valor_silla * contador_boletas;
    valor.innerHTML = "$" + subValor;
    if (contador_boletas > 3) {
      descuento.innerText = "$" + descuento_sillas;
      if( vip ){
        descuento_tarjeta.innerText = "$" + descuento_tarjeta_vip
        total.innerHTML = "$" + (subValor - (descuento_sillas + descuento_tarjeta_vip));
      }else{
        total.innerHTML = "$" + (subValor - descuento_sillas);
      }
    } else {
      if( vip ){
        descuento_tarjeta.innerText = "$" + descuento_tarjeta_vip;
        descuento.innerHTML = "$0";
        if( contador_boletas > 0 ){
          total.innerHTML = "$" + (subValor - descuento_tarjeta_vip);
        }else{
          total.innerHTML = "$" + subValor;
        }
      }else{
        descuento.innerHTML = "$0";
        descuento_tarjeta.innerText = "$0";
        total.innerHTML = "$" + subValor;
      }
    }
  };
}

//------------------------------------------------Tarjeta-------------------------------------------------

var verificar_tarjeta = document.getElementById('verificar_tarjeta');
var form_verificar_tarjeta = document.getElementById('form_verificar_tarjeta');
var error_tarjeta = document.getElementById('error_tarjeta');
var tarjeta  = document.getElementById('tarjeta');
var btn_verificar = document.getElementById('btn_verificar');
var div_verificar = document.getElementById('div_verificar');

if(verificar_tarjeta != null){

    verificar_tarjeta.addEventListener("click", e => {
      e.preventDefault();
      verificar_tarjeta.classList.add('d-none');
      div_verificar.classList.add('mt-2');
      div_verificar.classList.remove('d-none');
    });

    form_verificar_tarjeta.addEventListener("submit" , async e => {
      e.preventDefault();
      var data = new FormData( form_verificar_tarjeta );
      var res = await getTarjeta( data );
      if( res != 'error' ){
        vip = true;
        btn_verificar.classList.add('d-none');
        tarjeta.setAttribute('readonly', '');
      }else{
        error_tarjeta.innerText = 'La tarjeta no existe';
        setInterval(() => {
          error_tarjeta.innerText = '';
        }, 3000);
      }
    });

}

btn_comprar.addEventListener("click", () => {
  alert('Proximamente se hará esta función');
});

