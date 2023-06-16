import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const btnDelete = document.getElementById('my-btn');

btnDelete.addEventListener('click', function () {
    const formDelete = document.getElementById('my-form');
    formDelete.submit();
});
