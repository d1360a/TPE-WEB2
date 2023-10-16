<?php

class SectionModel{
     private $database;

     public function __construct(){
          $this -> database = new PDO('mysql:host=localhost;dbname=db_diario;charset=utf8', 'root', '');
     }

     #selecciona todas las secciones de la tabla seccion
     public function get_sections(){
          $query = $this->database->prepare('SELECT * FROM seccion');
          $query ->execute();

          return $query->fetchAll(PDO::FETCH_OBJ);
     }

     #selecciona una seccion buscada por id
     public function get_section_by_id($id){
          $query = $this->database->prepare('SELECT * FROM seccion WHERE id_seccion = ?');
          $query->execute([$id]);

          return $query->fetch(PDO::FETCH_OBJ);
     }

     #inserta una nueva seccion en la tabla seccion
     public function insert_section($sectionNAME){
          $query = $this->database->prepare('INSERT INTO seccion(nombre_seccion) VALUES(?)');
          $query->execute([$sectionNAME]);
     }

     #elimina una seccion filtrada por id
     public function delete_section($id){
          $query = $this->database->prepare('DELETE FROM seccion WHERE id_seccion = ?');
          $query->execute([$id]);
     }

     #modifica la seccion elegida por id
     public function update_section($id, $newName){
          $query = $this->database->prepare('UPDATE seccion SET nombre_seccion = :newName WHERE id_seccion = :id');
          $query->execute(array(':newName' => $newName, ':id' => $id));
     }

}