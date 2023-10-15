<?php

require_once('app/view/section.view.php');
require_once('app/model/section.model.php');


class SectionController
{
  private $model;
  private $view;
  private $modelNews;



  public function __construct()
  {
    $this->model = new Section_model();
    $this->view = new Section_view();
    $this->modelNews = new NewsModel();
  }
  public function addSection()
  {
    #validacion de datos del form
    $sectionName = $_POST['section_name'];
    $this->model->insertSection($sectionName);
    header('Location:' . BASE_URL);
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

  public function deleteSection($idSection){

    $this->model->delete_section($idSection);
    header('Location: ' . BASE_URL . '/listar');
  }
}
