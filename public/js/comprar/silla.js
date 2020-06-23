import { URL_BASE } from "../parametros.js";

async function getTarjeta(data) {
  let response = await fetch(URL_BASE + "user/tarjeta", {
    method: "POST",
    headers: {
      Accept: "application/json",
    },
    body: data,
  });
  return response.json();
}

const nombre_pelicula = document.getElementById("nombre_pelicula").value;
const sillas_seleccionadas = document.getElementById("sillas_seleccionadas");
const sillas = document.getElementsByClassName("silla");
const valor = document.getElementById("valor");
const total = document.getElementById("total");
const descuento = document.getElementById("descuento");
const descuento_tarjeta = document.getElementById("descuento_tarjeta");
var valor_total = 0;
var vip = false;

const valor_silla = 15000;
const descuento_sillas = 3000;
var descuento_tarjeta_vip = valor_silla * 0.45;
var contador_boletas = 0;
var sillas_compradas = {};
const btn_comprar = document.getElementById("comprar");

// Evento para cada silla.
for (var i = 0; i < sillas.length; i++) {
  sillas[i].onclick = function () {
    if (sillas_compradas[this.getAttribute("id")] == this.getAttribute("id")) {
      contador_boletas--;
      document.getElementById(this.getAttribute("id")).className =
        "text-primary ml-3";
      delete sillas_compradas[this.getAttribute("id")];
      sillas_seleccionadas.removeChild(
        document.getElementById(`${this.getAttribute("id")}_agregada`)
      );
    } else {
      contador_boletas++;
      sillas_seleccionadas.innerHTML += `<li id="${this.getAttribute(
        "id"
      )}_agregada" class="list-group-item"> <i class="fas fa-couch"></i> ${this.getAttribute(
        "id"
      )} </li>`;
      document.getElementById(this.getAttribute("id")).className =
        "text-success ml-3";
      sillas_compradas[this.getAttribute("id")] = this.getAttribute("id");
    }
    var subValor = valor_silla * contador_boletas;
    valor.innerHTML = "$" + subValor;
    if (contador_boletas > 3) {
      descuento.innerText = "$" + descuento_sillas;
      if (vip) {
        descuento_tarjeta.innerText = "$" + descuento_tarjeta_vip;
        valor_total = (subValor - (descuento_sillas + descuento_tarjeta_vip))
        total.innerHTML =
          "$" + valor_total;
      } else {
        valor_total = (subValor - descuento_sillas)
        total.innerHTML = "$" + valor_total;
      }
    } else {
      if (vip) {
        descuento_tarjeta.innerText = "$" + descuento_tarjeta_vip;
        descuento.innerHTML = "$0";
        if (contador_boletas > 0) {
          valor_total = (subValor - descuento_tarjeta_vip);
          total.innerHTML = "$" + valor_total;
        } else {
          valor_total = subValor
          total.innerHTML = "$" + valor_total;
        }
      } else {
        valor_total = subValor
        descuento.innerHTML = "$0";
        descuento_tarjeta.innerText = "$0";
        total.innerHTML = "$" + valor_total;
      }
    }

    //Boton Comprar
    if (contador_boletas > 0) {
      btn_comprar.removeAttribute("disabled");
    } else {
      btn_comprar.setAttribute("disabled", "true");
    }
  };
}

//------------------------------------------------Tarjeta-------------------------------------------------

var verificar_tarjeta = document.getElementById("verificar_tarjeta");
var form_verificar_tarjeta = document.getElementById("form_verificar_tarjeta");
var error_tarjeta = document.getElementById("error_tarjeta");
var tarjeta = document.getElementById("tarjeta");
var btn_verificar = document.getElementById("btn_verificar");
var div_verificar = document.getElementById("div_verificar");

if (verificar_tarjeta != null) {
  verificar_tarjeta.addEventListener("click", (e) => {
    e.preventDefault();
    verificar_tarjeta.classList.add("d-none");
    div_verificar.classList.add("mt-2");
    div_verificar.classList.remove("d-none");
  });

  form_verificar_tarjeta.addEventListener("submit", async (e) => {
    e.preventDefault();
    var data = new FormData(form_verificar_tarjeta);
    var res = await getTarjeta(data);
    if (res != "error") {
      if (res == "tarjeta-error") {
        error_tarjeta.innerText = "La tarjeta no coincide con la registrada o no tienes tarjeta asigada.";
        setInterval(() => {
          error_tarjeta.innerText = "";
        }, 3000);
      } else {
        vip = true;
        btn_verificar.classList.add("d-none");
        tarjeta.setAttribute("readonly", "");
      }
    } else {
      error_tarjeta.innerText = "La tarjeta no existe";
      setInterval(() => {
        error_tarjeta.innerText = "";
      }, 3000);
    }
  });
}

btn_comprar.addEventListener("click", () => {
  // window.open(URL_BASE + 'user/generador_pdf', '_blank');
  let modal = document.getElementById("modal");
  modal.innerHTML = `
    <div class="modal modal-dialog modal-dialog-scrollable" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmación de compra</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Desea realizar la compra para la pelicula <b>${nombre_pelicula} </b>?
            <hr>
            <form>
              <div class="form-group">
                <label> Cantidad </label>
                <input name="cantidad" class="form-control" readonly value="${contador_boletas}" />
              </div>
              <div class="form-group">
                <label> Valor unitario </label>
                <input name="precio" class="form-control" readonly value="${valor_silla}" />
              </div>
              <div class="form-group">
                <label> Desceunto por silla </label>
                <input name="descuento_silla" class="form-control" readonly value="${contador_boletas > 3 ? descuento_sillas : "0"}" />
              </div>
              <div class="form-group">
                <label> Descuento por tarjeta </label>
                <input name="descuento_tarjeta" class="form-control" readonly value="${vip ? descuento_tarjeta_vip : "0"}" />
              </div>
              <div class="form-group">
                <label> Fecha de la compra </label>
                <input name="fecha_creacion" class="form-control" readonly value="${ moment( Date.now() ).format('YYYY-MM-D') }" />
              </div>
              <div class="form-group">
                <label> Total </label>
                <input name="total" class="form-control" readonly value="${valor_total}" />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
  `;
  return modal;
});
