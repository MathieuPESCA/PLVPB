<?php
require_once "classes/Session.php";
require_once "models/DataBase.php";
require_once "models/Page.php";

$session = new Session();
$name = basename($_SERVER['PHP_SELF'],".php");





include "template/header.phtml";
include "template/$name.phtml";
include "template/footer.phtml";

?>
