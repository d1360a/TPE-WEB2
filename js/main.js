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




document.addEventListener("click", function(e) {
    if (e.target.classList.contains("edit-btn")) {
        var formCont = e.target.closest(".navbar-brand").querySelector(".form-container");

        if (formCont.classList.contains('visible')) {
            formCont.classList.remove('visible');
        } else {
            formCont.classList.add('visible');
        }
    }

    if (e.target.classList.contains("close-form-btn") ) {
        var formCont = e.target.closest(".form-container");
        formCont.classList.remove('visible');
    }

    if (e.target.classList.contains("edit-btn") || e.target.closest(".form-container")) {
        return;
    }

    var visibleForms = document.querySelectorAll(".form-container.visible");
    visibleForms.forEach(function (formCont) {
        formCont.classList.remove('visible');
    });
});












