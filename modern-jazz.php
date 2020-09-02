<?php
require_once "classes/Session.php";
require_once "models/DataBase.php";
require_once "models/Page.php";

$session = new Session();
$page = new Page();
$name = basename($_SERVER['PHP_SELF'],".php");

if(!empty($_POST)){

  $content = $_POST['tinymce'];

  $page->registerPage($name,$content);

}
$show = $page->getPage($name);



include "template/header.phtml";
include "template/$name.phtml";
include "template/footer.phtml";

?>
