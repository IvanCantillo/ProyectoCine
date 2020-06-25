import { URL_BASE } from "../parametros.js";

async function edit(data) {
  let response = await fetch(URL_BASE + "admin/update", {
    method: "POST",
    headers: {
      Accept: "application/json",
    },
    body: data,
  });
  return response.json();

}

const form_edit = document.getElementById("form_edit");

form_edit.addEventListener("submit", async e => {
  e.preventDefault();
  const data = new FormData(form_edit);
  const res = await edit( data );
  if (res.message == 'ok') {
    window.location = URL_BASE + 'Admin/listaUsuarios'
  }
});
