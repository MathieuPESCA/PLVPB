<?php
class User {

  public function loginCheck($mail,$mdp){
    $bdd = new DataBase();
    $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
    $result = $bdd->queryOne($sql,[$mail,$this->hash($mdp)]);
    if(!empty($result)){
      return $result;
    }else{
      throw new DomainException("Informations de connection invalides");
    }
  }

  public function register($name,$fname,$bday,$mail,$mdp,$repeat){
      if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        throw new DomainException("Format de l'email invalide");
      }
      if(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#',$mdp) && strlen($mdp) < 8){
        throw new DomainException("Format du mot de passe invalide");
      }
      if($mdp != $repeat){
        throw new DomainException("Erreur lors de la confirmation du mot de passe");
      }
      $bdd = new DataBase();
      $sql = "INSERT INTO user VALUES (NULL,?,?,?,?,?,'user')";
      $bdd->executeSql($sql,[$name,$fname,$bday,$mail,$this->hash($mdp)]);
  }

  public function mailCheck($mail){
    $bdd = new DataBase();
    $sql = "SELECT email FROM user WHERE email = ?";
    $check = $bdd->queryOne($sql,[$mail]);
    if(!empty($check)){
      throw new DomainException("Un compte correspondant à cette adresse est déjà existant.");
    }
  }

  private function hash($mdp){
    $salt = 69;
    return crypt($mdp,$salt);
  }
}
?>
