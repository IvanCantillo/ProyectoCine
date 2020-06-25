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
        if( res.message == 'password-error' ){
            password_error.innerText = 'La contraseña es incorrecta';
            setTimeout(() => {
                password_error.innerText = '';
            }, 3000);
        }else if( res.message == 'user-bloqueado' ){
            email_error.innerText = 'Haz sido bloqueado por incumplimiento de normas';
            setTimeout(() => {
                email_error.innerText = '';
            }, 3000);
        }else {
            email_error.innerText = 'El correo es incorrecto';
            setTimeout(() => {
                email_error.innerText = '';
            }, 3000);
        }
    }
})

