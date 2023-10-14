<?php

class NewsView {
    public function showNews($newss) {

        require 'templates/news.grid.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}
