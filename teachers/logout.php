<?php
   session_start();
  
   include "includes/functions.php";
   unset($_SESSION['T_LOGIN']);
   redirect('login.php');


?>