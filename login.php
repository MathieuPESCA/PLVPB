<?php

require_once "models/DataBase.php";
require_once "models/User.php";
require_once "classes/Validator.php";
require_once "classes/Session.php";

if(!empty($_POST)){

  $post = Validator::cleanArray($_POST);

  $mail = $post["mail"];
  $mdp = $post["password"];

  try{
    $user = new User();
    $log = $user->loginCheck($mail,$mdp);

    $session = new Session();
    $session->setSession('user',$log);
    header("Location:index.php");
    exit();
  }catch(DomainException $e){
    $erreur = $e->getMessage();
  }
}


include_once "template/header.phtml";
include_once "template/login.phtml";
include_once "template/footer.phtml";


?>
