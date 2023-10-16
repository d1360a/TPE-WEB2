<?php

class SectionView
{
     
     #muestra la pagina de una seccion en concreto
     public function show_section_page($section, $news)
     {
          require('./templates/section.page.phtml');
     }

     #muestra el formulario de edicion de secciones
     public function show_edit_form($sectionData)
     {
          require('./templates/form.editar.phtml');
     }
}
