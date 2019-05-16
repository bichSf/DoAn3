<?php 
session_start();

unset($SESSION['name_user']);
unset($SESSION['level_user']);

header("location: ../../public/frontend/index.php")
 ?>