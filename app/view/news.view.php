<?php

class NewsView {
    public function showNews($newss, $sections) {
        require 'templates/news.grid.phtml';
    }

    function showEditNews($news, $sections){
        require 'templates/news.edit.phtml';
    }

    public function newsDetail($news) {
        require 'templates/news.detail.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}
