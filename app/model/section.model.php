<?php

require_once 'model.php';

class SectionModel extends Model{
     #Se borró la private db porque esta definida en model
     #tambien se elimino la funcion construct

     #selecciona todas las secciones de la tabla seccion
     public function getSections(){
          $query = $this->db->prepare('SELECT * FROM seccion');
          $query ->execute();

          return $query->fetchAll(PDO::FETCH_OBJ);
     }
     public function getSectionsById($id){
          $query = $this->db->prepare('SELECT * FROM seccion WHERE id_seccion = ?');
          $query->execute([$id]);

          return $query->fetch(PDO::FETCH_OBJ);
     }

     #inserta una nueva seccion en la tabla seccion
     public function insert_section($sectionNAME){
          $query = $this->db->prepare('INSERT INTO seccion(nombre_seccion) VALUES(?)');
          $query->execute([$sectionNAME]);
          return $this->db->lastInsertId();
     }


     #elimina una seccion filtrada por id
     public function delete_section($id){
          $query = $this->db->prepare('DELETE FROM seccion WHERE id_seccion = ?');
          $query->execute([$id]);
     }

     #modifica la seccion elegida por id
     public function update_section($id, $newName){
          $query = $this->db->prepare('UPDATE seccion SET nombre_seccion = :newName WHERE id_seccion = :id');
          $query->execute(array(':newName' => $newName, ':id' => $id));
     }

     function getSectionByNews($id){
          $query = $this->db->prepare('SELECT seccion.nombre_seccion FROM seccion INNER JOIN noticias ON noticias.id_seccion = seccion.id_seccion WHERE noticias.id = ?');
          $query->execute([$id]);
          $filter = $query->fetch(PDO::FETCH_OBJ);
          return $filter;
      }

      
}