<?php

require_once "models/DataBase.php";
require_once "models/User.php";
require_once "classes/Validator.php";

if(!empty($_POST)){

  $post = Validator::cleanArray($_POST);

  $name = $post['name'];
  $fname = $post['firstname'];
  $bday = $post['birthday'];
  $mail = $post['mail'];
  $mdp = $post['password'];
  $repeat = $post['repeat'];

  if(!empty($mail)
    && !empty($mdp)
    && !empty($repeat)
    && !empty($name)
    && !empty($fname)
    && !empty($bday)
  ){
    try {
      $user = new User();
      $user->mailCheck($mail);
      $user->register($name,$fname,$bday,$mail,$mdp,$repeat);
      header('Location:index.php');
      exit();
    }catch(DomainException $e){
      $erreur = $e->getMessage();
    }
  }else{
    $erreur = "Veuillez remplir tous les champs.";
  }
}


include_once "template/header.phtml";
include_once "template/register.phtml";
include_once "template/footer.phtml";

?>
