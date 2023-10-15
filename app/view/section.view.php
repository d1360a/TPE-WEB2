<?php

class SectionView {
     public function showForm($sections){
          require './templates/select.form.add.phtml';
     }

     public function show_view_section($section_data){
          require('./templates/section.view.phtml');
     }

     public function show_section_list($section_data){
          require('./templates/lista.secciones.phtml');
     }

     public function show_section_page($section, $news){
          require('./templates/section.page.phtml');
          
     }

}
