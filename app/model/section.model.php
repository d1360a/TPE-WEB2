<?php

class SectionModel{
     private $database;

     public function __construct(){
          $this -> database = new PDO('mysql:host=localhost;dbname=db_diario;charset=utf8', 'root', '');
     }

     public function getSections(){
          $query = $this->database->prepare('SELECT * FROM seccion');
          $query ->execute();

          return $query->fetchAll(PDO::FETCH_OBJ);
     }

     public function insertSection(){
          
     }

     public function getSectionNameById($id){
          $query = $this->database->prepare('SELECT * FROM seccion WHERE id_seccion = :id');
      
          $query->execute([':id' => $id]);

        return $query->fetch(PDO::FETCH_ASSOC);
     }

}