<?php

class Section_model{
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

}