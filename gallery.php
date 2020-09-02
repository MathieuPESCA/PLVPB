<?php
require_once "classes/Session.php";
require_once "models/DataBase.php";
require_once "models/Photo.php";

$photos = new Photo();
$page = $_GET['page'];
$limit = 2;
$offset = ($page - 1) * $limit;

if(!empty($_POST)){
  $photo = $_POST['photo'];
  $title = $_POST['title'];

  $photos->registerPhoto($photo,$title);
}

$gallery = $photos->getPhotos($limit,$offset);

$result = $photos->getTotalPhotos();
$nbrPage = ceil($result['nbrPhoto'] / $limit);

include "template/header.phtml";
include "template/gallery.phtml";
include "template/footer.phtml";
?>
