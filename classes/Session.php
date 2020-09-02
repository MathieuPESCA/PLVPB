<?php
class Session {

  public function __construct(){
    if(session_status() == PHP_SESSION_NONE){
      session_start();
    }
  }

  public function setSession($key,$value){
    $_SESSION[$key] = $value;
  }

  public function closeSession(){
    $_SESSION = array();
    session_destroy();
  }
}

?>
  
