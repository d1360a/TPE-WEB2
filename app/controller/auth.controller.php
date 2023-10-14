<?php

require('./app/model/user.model.php');
require('./app/view/auth.view.php');
require('./app/helper/auth.helper.php');

class Auth_controller {
     private $model;
     private $view;

     public function __construct()
     {
          $this -> model = new User_model;
          $this -> view = new Auth_view;
     }

     #login
     public function showLogin(){
          $this -> view -> show_view_login();
     }

     public function authenticateUser(){
          #recepcion de datos
          $username = $_POST['username'];
          $password = $_POST['password'];
          
          #validamos los datos
          if (!isset($username) || !isset($password)){
               $this -> view -> show_view_login("Faltan completar datos");
               return;
          }

          #obtencion del user de la BBDD
          $user = $this -> model -> get_user_by_username($username);
          
          #autenticacion usuario
          if($user && $password && $user -> password){
               AuthHelper::login_user($user);
               header('Location: ' . BASE_URL);
          } else {
               $this -> view->show_view_login("Usuario invalido");
          }
     }

     public function logout(){
          AuthHelper::logout_user();
          header('Location:' . BASE_URL);
     }


}