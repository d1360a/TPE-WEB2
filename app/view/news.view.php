<?php

class NewsView {

    #este section se pasa porque en el controlador de vistas esta instanciado el modelo de seccion
    public function showNews($newss) {
        require 'templates/news.grid.phtml';
    }

    function showEditNews($news){
        require 'templates/news.edit.phtml';
    }

    public function newsDetail($news) {
        require 'templates/news.detail.phtml';
    }

    public function showError($error = null) {
        require 'templates/error.phtml';
    }
}
