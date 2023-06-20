import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// Gestione eliminazione immagine food
// const btnDelete = document.getElementById('my-btn');

// btnDelete.addEventListener('click', function () {
//     const formDelete = document.getElementById('my-form');
//     formDelete.submit();
// });

// Validazioni lato client
const checkboxes = document.getElementsByClassName('register_check');
const register_submit = document.getElementById('register_submit');
const types_required_register = document.querySelector('.types_required_register');
const register_password = document.getElementById('password');
const register_password_confirm = document.getElementById('password-confirm');
const password_equal_register = document.querySelector('.password_equal_register');

register_submit.addEventListener('click', checkIfChecked);
register_password_confirm.addEventListener('focusout', checkPassword);

console.log(checkboxes);

function checkIfChecked() {
    let validationCheck = false

    for(let i=0; i<checkboxes.length; i++ ) {
        if(checkboxes[i].checked ==true) {
            validationCheck = true
        }
        
    }
    console.log('validationCheck=' + validationCheck);
    if(validationCheck == false) {
        types_required_register.classList.remove('d-none');
        register_submit.preventDefault
    } else {
        types_required_register.classList.add('d-none');
    }
}

function checkPassword() {
    if(register_password.value != register_password_confirm.value) {
        password_equal_register.classList.remove('d-none');
    } else {
        password_equal_register.classList.add('d-none');
    }
}