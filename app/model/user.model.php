<?php

require_once 'model.php';

class UserModel extends Model{
     #Se borró private database y se sustituyo database por db
     #Se borró la funcion construct

     #trae todos los datos del usuario usando su email
     public function get_user_by_username($username){
          $query = $this -> db -> prepare('SELECT * FROM usuario WHERE nombre = ?');
          $query -> execute([$username]);

          return $query -> fetch(PDO::FETCH_OBJ);
     }
}