<?php

class NewsView {

    #este section se pasa porque en el controlador de vistas esta instanciado el modelo de seccion
    public function showNews($newss, $sections) {
        require 'templates/news.grid.phtml';
    }

    public function showError($error = null) {
        require 'templates/error.phtml';
    }
}
