<?php

   require_once('app/view/section.view.php');
   require_once('app/model/section.model.php');  
   require_once('./templates/form_alta.phtml');

   class SectionController {
      private $model;
      private $view;
  
      public function __construct() {  
          $this->model = new Section_model();
          $this->view = new Section_view();

          $sections = $this->model->getSections();
          $this->view->showForm($sections);
      }

  }
  