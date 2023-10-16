<?php

class Section_model{
     private $database;

     public function __construct(){
          $this -> database = new PDO('mysql:host=localhost;dbname=db_diario;charset=utf8', 'root', '');
     }

     //recupera todas las secciones de la tabla
     public function getSections(){
          $query = $this->database->prepare('SELECT * FROM seccion');
          $query ->execute();

          return $query->fetchAll(PDO::FETCH_OBJ);
     }

     //recupera todos los datos de una seccion
     public function getSectionsById($id){
          $query = $this->database->prepare('SELECT * FROM seccion WHERE id_seccion = ?');
          $query->execute([$id]);

          return $query->fetch(PDO::FETCH_OBJ);
     }

     public function insertSection($sectionNAME){
          $query = $this->database->prepare('INSERT INTO seccion(nombre_seccion) VALUES(?)');
          $query->execute([$sectionNAME]);
     }

     public function delete_section($id){
          $query = $this->database->prepare('DELETE FROM seccion WHERE id_seccion = ?');
          $query->execute([$id]);
     }

     public function edit_section($id, $name){
          $query = $this->database->prepare('UPDATE seccion SET nombre_seccion = :name WHERE id_seccion = :id');
          $query->execute(array(':name' => $name, ':id' => $id));     }
}