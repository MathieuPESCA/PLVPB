<?php
class Validator{

  static public function clean($a){
    $a = trim($a);
    $a = stripslashes($a);
    $a = htmlspecialchars($a,ENT_QUOTES);
    return $a;
  }
  
  static public function cleanArray($array){
    foreach ($array as $key => $data) {
      $tab[$key] = self::clean($data);
    }
    return $tab;
  }
}
?>
