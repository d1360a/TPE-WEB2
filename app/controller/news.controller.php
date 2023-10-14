<?php

   require_once('app/view/news.view.php');
   require_once('app/model/news.model.php');  

   class NewsController {
      private $model;
      private $view;
  
      public function __construct() {  
          $this->model = new NewsModel();
          $this->view = new NewsView();
      }
  
      public function showNews() {
          $newss = $this->model->getNews();
          $this->view->showNews($newss);
      }
  
      public function addNews() {
  
          $title = $_POST['title'];
          $content = $_POST['content'];
          $date = $_POST['date'];
          $hour = $_POST['hour'];
          $id_section = $_POST['id_section'];
         
          if (empty($title) || empty($content)|| empty($date)|| empty($hour)|| empty($id_section)) {
              $this->view->showError("Debe completar todos los campos");
              return;
          }
  
          $id = $this->model->insertNews($title, $content, $date, $hour, $id_section);
          if ($id) {
              header('Location: ' . BASE_URL);
          } else {
              $this->view->showError("Error al insertar la noticia");
          }
      }
  
      function removeNews($id) {
          $this->model->deleteNews($id);
          header('Location: ' . BASE_URL);
      }
      
      
  
  }
  