function silla_comprar(silla) {
    if (sillas_compradas[silla] == silla) {
        document.getElementById(silla).className = "text-primary ml-3";
        delete sillas_compradas[silla];
        sillas_seleccionadas.removeChild(document.getElementById(`${silla}_agregada`));
        contador_boletas--;
    }else {
        sillas_seleccionadas.innerHTML += `<li id="${ silla }_agregada" class="list-group-item"> <i class="fas fa-couch"></i> ${silla} </li>`;
        document.getElementById(silla).className = "text-success ml-3";
        sillas_compradas[silla] = silla;
        contador_boletas++;
    }
    let subValor = valor_silla * contador_boletas; 
    valor.innerHTML = '$'+ subValor;  
    if (contador_boletas > 3) {
        descuento.innerHTML = '$'+ descuento_prueba;
        total.innerHTML = '$'+ (subValor - descuento_prueba);
    }else {
        total.innerHTML = '$'+ subValor;
        descuento.innerHTML = '$0';
    }
 }


const sillas_seleccionadas = document.getElementById('sillas_seleccionadas');
const valor = document.getElementById('valor');
const total = document.getElementById('total');
const descuento = document.getElementById('descuento');

const valor_silla = 5000;
const descuento_prueba = 3000;
var contador_boletas = 0;

var sillas_compradas = {};

const btn_comprar = document.getElementById('comprar');

btn_comprar.addEventListener('click', () => alert('Proximamente se hará esta función'));