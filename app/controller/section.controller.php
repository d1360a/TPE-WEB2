<?php

require_once('app/view/section.view.php');
require_once('app/model/section.model.php');


class SectionController
{
  private $model;
  private $view;
  private $modelNews;

  #crea una instancia de cada clase cuando se instancia el controlador
  public function __construct()
  {
    $this->model = new SectionModel();
    $this->view = new SectionView();
    $this->modelNews = new NewsModel();
  }

  #agrega una seccion nueva en la db
  public function addSection()
  {
    $sectionName = $_POST['section_name'];
    $this->model->insert_section($sectionName);
    header('Location:' . BASE_URL);
  }

  #muestra la pagina de una seccion filtrada por id
  public function showSectionPage($id)
  {
    $section = $this->model->get_section_by_id($id);
    $news = $this->modelNews->getNewsBySectionId($section->id_seccion);
    $this->view->show_section_page($section, $news);
  }

  #elimina la seccion elegida por id
  public function deleteSection($id)
  {
    $this->model->delete_section($id);
    header('Location: ' . BASE_URL . '/listar');
  }

  #editar seccion
  public function editSection($id)
  {
    if (isset($_POST['secNewName'])) {
      $newName = $_POST['secNewName'];
      $this->model->update_section($id, $newName);
    }
    header('Location:' . BASE_URL);
  }
}
