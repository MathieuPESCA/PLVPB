<?php
class DataBase {

  private $bdd;

  public function __construct(){
    try{
      $this->bdd = new PDO('mysql:host=localhost;port=3308;dbname=plvpb;charset=utf8','root','');
    }catch(PDOException $e){
      echo 'Connexion échouée : '.$e->getMessage();
    }
  }

  public function executeSql($sql, array $values = array()){

		$query = $this->bdd->prepare($sql);

		$query->execute($values);

		return $this->bdd->lastInsertId();
	}

  public function query($sql, $values = array()){

    $query = $this->bdd->prepare($sql);

    $query->execute($values);

    return $query->fetchAll();
  }

  public function queryOne($sql, $values = array()){

    $query = $this->bdd->prepare($sql);

    $query->execute($values);

    return $query->fetch();
  }




}
?>
