<?php

require_once('app/view/news.view.php');
require_once('app/model/news.model.php');
require_once('app/model/section.model.php');

class NewsController{
    
    private $modelNews;
    private $view;
    private $modelSection;

    public function __construct(){
        $this->modelNews = new NewsModel();
        $this->view = new NewsView();
        $this->modelSection = new SectionModel();
    }

    public function showNews(){
        $sections = $this->modelSection->getSections();
        $newss = $this->modelNews->getNews();
        $this->view->showNews($newss, $sections);
        var_dump(MYSQL_HOST);
    }

    public function addNews(){

        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $hour = $_POST['hour'];
        $id_section = $_POST['id_section'];

        if (empty($title) || empty($content) || empty($date) || empty($hour) || empty($id_section)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->modelNews->insertNews($title, $content, $date, $hour, $id_section);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la noticia");
        }
    }



    public function editNews($id){
        
        #validacion de datos

            $title = $_POST['title'];
            $content = $_POST['content'];
            $date = $_POST['date'];
            $hour = $_POST['hour'];
            $idSection = $_POST['id_section'];

            $this->modelNews->updateNews($id, $title, $content, $date, $hour, $idSection);
        
            header('Location: ' . BASE_URL . "detalleNoticia/$id");
    }

    //if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['date']) && !empty($_POST['hour']) && !empty($_POST['id_section'])){

    function removeNews($id){
        $this->modelNews->deleteNews($id);
        header('Location: ' . BASE_URL);
    }


    function detailNews($id){
        $news = $this->modelNews->getNewsById($id);
        $sections = $this-> modelSection->getSections();
        
        $this->view->newsDetail($news, $sections);
    }
}
