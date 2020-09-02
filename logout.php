<?php

require_once "classes/Session.php";

$session = new Session();
$session->closeSession();

header("Location:index.php");
exit();

?>
