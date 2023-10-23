<?php 
 include('database.inc.php');
 include('functions.inc.php');

  unset($_SESSION['IS_LOGIN']);
  redirect('login.php');
 
?>