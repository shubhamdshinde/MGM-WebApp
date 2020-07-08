<?php
   session_start();
   include "config/dbconnect.php";
   include "includes/functions.php";


   if(!isset($_SESSION['T_LOGIN'])){

   	redirect('login.php');
   	
   }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Notes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="manifest" href="./manifest.json">
    <link rel="apple-touch-icon" href="./img/logo-72.png">
    <meta name="apple-mobile-web-app-status-bar" content="#ffff">
    <link rel='icon' href='img/favicon.ico' type='image/x-icon'/ >
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

</head>
<body>

<nav class="head">

     <h4 class="head_text">Hi, <?php echo $_SESSION['tname']; ?></h4>

</nav>	
<nav class="nav">
	  <a href="index.php" class="nav__link ">
		    <i class="material-icons nav__icon">home</i>
		    <span class="nav__text">Home</span>
	  </a>	  
	  <a href="notes.php" class="nav__link nav__link--active">
		    <i class="material-icons nav__icon">article</i>
		    <span class="nav__text">Notes</span>
	  </a>
	  <a href="notice.php" class="nav__link ">
		    <i class="material-icons nav__icon">announcement</i>
		    <span class="nav__text">Notice</span>
	  </a>
	   <a href="profile.php" class="nav__link ">
		    <i class="material-icons nav__icon">person</i>
		    <span class="nav__text">Profile</span>
	  </a>
</nav>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="main_login">

<h4 class="head_text">SUCCESSFULL</h4>

</div>


</body>
</html>