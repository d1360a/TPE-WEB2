<?php

class SectionView
{
     
     #muestra la pagina de una seccion en concreto
     public function show_section_page($section, $news, $error = null)
     {
          require('./templates/section.page.phtml');
     }

     #muestra el formulario de edicion de secciones
     public function show_edit_form($sectionData)
     {
          require('./templates/form.editar.phtml');
     }

     #muestra un mensaje de error 
     public function show_error_section($error){
          require './templates/error.phtml';
     }

     public function show_sections_list($sections){
          require './templates/sections.list.phtml';
     }
}
