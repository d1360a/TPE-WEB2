<?php

class NewsDetail {
    public function newsDetail($news) {

        require 'templates/news.detail.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}