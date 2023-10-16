"use strict"

//borra todos los campos del formulario
//nodo del formulario 
let form = document.querySelector('#news-form');

//nodo del boton
let boton = document.querySelector('#btn-cancelar');

//escuchador
boton.addEventListener("click", function () {


     // Obtén una referencia al elemento select
     const selectElement = document.querySelector('select');

     // Establece el valor del select en una opción no válida, como una opción vacía
     selectElement.value = '';

     let inputs = form.querySelectorAll('input');
     let textarea = document.querySelector('#textarea');

     textarea.value = '';
     inputs.forEach(function (input) {
          input.value = '';
     })
});


;