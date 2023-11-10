<?php

class SectionView
{
     
     #muestra la pagina de una seccion en concreto
     public function show_section_page($section, $news, $error = null)
     {
          require('./templates/section.page.phtml');
     }

     #muestra un mensaje de error 
     public function show_error_section($error){
          require './templates/error.phtml';
     }

     public function show_edition_page($section){
          require './templates/edit.section.phtml';
     }

}
