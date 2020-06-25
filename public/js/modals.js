var actualizar_modal = document.getElementById('actualizar_modal'); 

function deleteUser( id, URL_BASE ) {
    let modal = document.getElementById('modal');
    modal.innerHTML =  `
                        <div class="modal fade" id="modal${id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">¡Alerta!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estas sesguro que quieres eliminar este usuario?
                                    </div>
                                    <div class="modal-footer">
                                    <form action="${URL_BASE}admin/eliminar" method="POST">
                                        <input type="hidden" name="id" value="${id}">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                    </div>`;
  return modal;
}


