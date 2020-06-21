horario = document.getElementById('horario');
btn_seleccionar_sillas = document.getElementById('seleccionar_sillas')

horario.addEventListener('change', e => {
    if ( horario.value != 0 && horario.value < 4 ) {
        btn_seleccionar_sillas.classList.remove('d-none');
        horario.classList.add('d-none'); 
    }
});