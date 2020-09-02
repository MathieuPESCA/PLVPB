<?php
class Page {

    public function registerPage($name,$content){
      $bdd = new DataBase();
      $check = $this->getPage($name);
      if(!empty($check)){
        $sql = "UPDATE page SET content = ? WHERE name = ?";
        $bdd->executeSql($sql,[$content,$name]);
      }else {
        $sql = "INSERT INTO page VALUES (NULL,?,?)";
        $bdd->executeSql($sql,[$name,$content]);
      }

    }
    public function getPage($name){
      $bdd = new DataBase();
      $sql="SELECT * FROM page WHERE name = ?";
      return $bdd->queryOne($sql,[$name]);
    }
}
?>
