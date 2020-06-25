async function get_tarjetas( URL_BASE ) {
  var formData = new FormData();
  formData.append("tarjetas", "si hay");

  const response = await fetch(URL_BASE + "user/tarjetas", {
    method: "POST",
    headers: {
      Accept: "application/json",
    },
    body: formData,
  });
  return await response.json();
}

async function user_vip( URL_BASE, user_id, vip, tarjeta, rol ) {
  var formData = new FormData();
  formData.append("id", user_id);
  formData.append('vip', vip);
  if (tarjeta != null) {
    formData.append('tarjeta', tarjeta);
  }
  if (rol != null) {
    formData.append('rol', rol);
  }

  const response = await fetch(URL_BASE + "User/user_vip", {
    method: "POST",
    headers: {
      Accept: "application/json",
    },
    body: formData,
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

async function aceptar_solicitud( URL_BASE, user_id ){
    let res = await get_tarjetas( URL_BASE );
    res.forEach((element) => {
      let existe = false;
      existe = array.some((valor) => valor == element["tarjeta"]);
      if (!existe) {
        array.push(element["tarjeta"]);
      }
    });
    let tarjeta = generar_tarjeta();
    let resVip = await user_vip( URL_BASE, user_id, 1, tarjeta, rol = 2 );
    if (resVip == 'ok') {
      window.location = URL_BASE + 'Admin/solicitudesVip';
    }
}

async function eliminar_solicitud( URL_BASE, user_id ){
  let resVip = await user_vip( URL_BASE, user_id, 2, tarjeta = null, rol = null);
  if (resVip == 'ok') {
    window.location = URL_BASE + 'Admin/solicitudesVip';
  }
}
