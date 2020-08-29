<?php
   session_start();
  
   include "includes/functions.php";
   unset($_SESSION['IS_LOGIN']);
   redirect('login.php');
  

?>