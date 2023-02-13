<?php 

include "config.php";


session_start();

session_unset();

session_destroy();


header("Location: {$host_namelink}/admin/");

?>
