<?php

   require_once('app/view/section.view.php');
   require_once('app/model/section.model.php');  
   require_once('./templates/form_alta.phtml');

   class SectionController {
      private $model;
      private $view;
  
      public function __construct() {  
          $this->model = new SectionModel();
          $this->view = new SectionView();

          $sections = $this->model->getSections();
          $this->view->showForm($sections);
      }
      public function addSection(){
        #validacion de datos del form



        $this->model->insertSection();
      }

  }
  