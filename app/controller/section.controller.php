<?php

require_once('app/view/section.view.php');
require_once('app/model/section.model.php');


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

  public function showSection($id_section)
  {
    #traemos los datos de las secciones
    $section = $this->model->getSectionsById($id_section);
    $this->view->show_section_list($section);
  }

  public function showSectionPage($id)
  {
    #traemos datos de una sola seccion
    $section = $this->model->getSectionsById($id);
    
    #traemos las noticias
    $news = $this->modelNews->getNewsBySectionId($section->id_seccion);
    
    $this->view->show_section_page($section, $news);
  }
}
