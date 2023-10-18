<?php

class AuthHelper {

     #iniciar la session, se comprueba si esta activa
     public static function initiate_session(){
          if(session_status() != PHP_SESSION_ACTIVE){
               session_start();
          }
     }

     #se guardan datos del usuario en superglobales session
     public static function login_user($user){
          AuthHelper::initiate_session();
          $_SESSION['USERNAME'] = $user->nombre;
          $_SESSION['USER_ID'] = $user->id_usuario;
     }

     #cerrar la session
     public static function logout_user(){
          AuthHelper::initiate_session();
          session_destroy();
     }

     #verificar si el usuario esta logueado
     public static function verify_user(){
          AuthHelper::initiate_session();
          if(!isset($_SESSION['USER_ID'])){
               header('Location: ' . BASE_URL);
               die();
          }
     }
}