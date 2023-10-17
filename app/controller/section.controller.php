<?php

require_once('app/view/section.view.php');
require_once('app/model/section.model.php');


class SectionController
{
  private $viewNews;
  private $modelSection;
  private $view;
  private $modelNews;

  #crea una instancia de cada clase cuando se instancia el controlador
  public function __construct()
  {
    $this->modelSection = new SectionModel();
    $this->view = new SectionView();
    $this->modelNews = new NewsModel();
    $this->viewNews = new NewsView();
  }

  #agrega una seccion nueva en la db
  public function addSection(){
    $sectionName = $_POST['section-name'];
    
    if (empty($sectionName)) {
      $this->viewNews->showError('El campo esta vacio');
      return;
    } 
    $id = $this->modelSection->insert_section($sectionName);
    if ($id) {
        header('Location: ' . BASE_URL);
    } else {
        $this->viewNews->showError("Error al insertar la noticia");
    }
  }

  #muestra la pagina de una seccion filtrada por id
  public function showSectionPage($id)
  {
    $section = $this->modelSection->getSectionsById($id);
    $news = $this->modelNews->getNewsBySectionId($section->id_seccion);
    $this->view->show_section_page($section, $news);
  }

  #elimina la seccion elegida por id
  public function deleteSection($id)
  {
    $this->modelSection->delete_section($id);
    header('Location: ' . BASE_URL );
  }

  public function showEditionPage($id){
    $section = $this->modelSection->getSectionsById($id);
      $this->view->show_edition_page($section);
  }

  public function uploadSectionChanges($id){
    #toma de datos
    if (!empty($_POST['new-name'])){
      $newName = $_POST['new-name'];
      $this->modelSection->update_section($id, $newName);
      header('Location: '. BASE_URL);
    }else {
      $this->view->show_error_section("No completo los campos");
      return;
    }
    
  }



}
