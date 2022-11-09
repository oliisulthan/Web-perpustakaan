<?php
session_start();
$_SESSION=[];
session_unset();
session_destroy();

setcookie('yup','', time() - 3600);
setcookie('yek', '', time() - 3600 );

header("Location:loginAdm.php");
exit;




?>