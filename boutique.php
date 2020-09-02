<?php
require_once "classes/Session.php";

$session = new Session();
$name = basename($_SERVER['PHP_SELF'],".php");





include "template/header.phtml";
include "template/$name.phtml";
include "template/footer.phtml";

?>
