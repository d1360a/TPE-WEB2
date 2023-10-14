<?php

class User_model{
     private $database;

     public function __construct(){
          $this -> database = new PDO('mysql:host=localhost;dbname=db_diario;charset=utf8', 'root', '');
     }

     #trae todos los datos del usuario usando su email
     public function get_user_by_username($username){
          $query = $this -> database -> prepare('SELECT * FROM usuario WHERE nombre = ?');
          $query -> execute([$username]);

          return $query -> fetch(PDO::FETCH_OBJ);
     }
}