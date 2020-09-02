<?php
class Photo{

  public function registerPhoto($photo,$title){
    $bdd = new DataBase();
    $sql = "INSERT INTO photo VALUES (NULL,?,?)";
    $bdd->executeSql($sql,[$title,$photo]);
  }

  public function getPhotos($limit,$offset){
    $bdd = new DataBase();
    $sql = "SELECT * FROM photo LIMIT $limit OFFSET $offset";
    return $bdd->query($sql);
  }
  public function getTotalPhotos(){
    $bdd = new DataBase();
    $sql = "SELECT COUNT(file) AS nbrPhoto FROM photo";
    return $bdd->queryOne($sql);
  }
}
 ?>
