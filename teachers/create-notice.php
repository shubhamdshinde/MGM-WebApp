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
	<title>Notice</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
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
	  <a href="notes.php" class="nav__link">
		    <i class="material-icons nav__icon">article</i>
		    <span class="nav__text">Notes</span>
	  </a>
	  <a href="notice.php" class="nav__link nav__link--active">
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
<div class="main_login">
	<form action="" id="submit_form" method="POST">
        
	    <center>
	    <select class="button1" name="name" id="name" placeholder="Class" required >
	      <option value="" >SELECT BATCH</option>
	      <option value="FY BCS A">FY BCS A</option>
	      <option value="FY BCS B">FY BCS B</option>
	      <option value="SY BCS A">SY BCS A</option>
	      <option value="SY BCS B">SY BCS B</option>
	      <option value="TY BCS A">TY BCS A</option>
	      <option value="TY BCS B">TY BCS B</option>
	   </select>

	   <br>
	   <br>
	   <br>

	    <textarea class="button1" name="message" id="message" placeholder="Enter a Message.." rows="10" cols="38" required ></textarea>

		<br>
		<input type="submit" class="button1" id="submit" value="SEND" name="submit"/>
		<br>
</center>
	</form>
</div>

</body>
</html>

 <?php  

		 if(isset($_POST["name"]))  
		 {  
		 	   $teach_name= $_SESSION['tname'];
		       $class = mysqli_real_escape_string($con, $_POST["name"]);  
		       $message = mysqli_real_escape_string($con, $_POST["message"]);  
		      $sql = "INSERT INTO `notice`( `message`, `name`, `class`) VALUES ('$message','$teach_name','$class');"; 

		      if(mysqli_query($con, $sql))  
		      {  
		           redirect('notice.php');
		      }  
		 }  


 ?> 