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

     public function getSectionsById($id){
          $query = $this->database->prepare('SELECT * FROM seccion WHERE id_seccion = ?');
          $query->execute([$id]);

          return $query->fetch(PDO::FETCH_OBJ);
     }

     public function insertSection(){
          
     }

<<<<<<< HEAD
     public function getSectionNameById($id){
          $query = $this->database->prepare('SELECT * FROM seccion WHERE id_seccion = :id');
      
          $query->execute([':id' => $id]);

        return $query->fetch(PDO::FETCH_ASSOC);
     }
=======

>>>>>>> 2faf5dcd7ebd45304f2bd4259264a12e664b02e2

}