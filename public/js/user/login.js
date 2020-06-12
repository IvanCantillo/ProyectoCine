import { URL_BASE } from '../parametros.js';

async function login( data ) {
    let response = await fetch(URL_BASE + 'user/signin', {
        method: 'POST',
        headers: {
            Accept: "application/json",
        },
        body: data
    });
    return await response.json();
}

const form_login = document.getElementById('form_login');
const email_error = document.getElementById('email_error');
const password_error = document.getElementById('password_error');

form_login.addEventListener('submit', async (e) => {
    e.preventDefault();
    const data = new FormData( form_login );
    const res = await login( data );
    console.log( res.message )
    if ( res.error === false) {
        window.location = URL_BASE + 'inicio/'
    }else {
        email_error.innerText = 'El correo es incorrecto';
        setTimeout(() => {
            email_error.innerText = '';
        }, 3000);
    }
})

