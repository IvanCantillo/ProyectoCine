import { URL_BASE } from '../parametros.js';

const sillas_seleccionadas = document.getElementById("sillas_seleccionadas");
const sillas = document.getElementsByClassName("silla");
const valor = document.getElementById("valor");
const total = document.getElementById("total");
const descuento = document.getElementById("descuento");

const valor_silla = 5000;
const descuento_prueba = 3000;
var contador_boletas = 0;
var sillas_compradas = {};
const btn_comprar = document.getElementById("comprar");

// Evento para cada silla.
for (var i = 0; i < sillas.length; i++) {
    sillas[i].onclick = function () {
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
    let subValor = valor_silla * contador_boletas;
    valor.innerHTML = "$" + subValor;
    if (contador_boletas > 3) {
      descuento.innerHTML = "$" + descuento_prueba;
      total.innerHTML = "$" + (subValor - descuento_prueba);
    } else {
      total.innerHTML = "$" + subValor;
      descuento.innerHTML = "$0";
    }
  };
}

btn_comprar.addEventListener("click", () => {
  // alert('Proximamente se hará esta función');
});
