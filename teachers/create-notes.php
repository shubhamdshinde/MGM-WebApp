<?php
   session_start();
   include "config/dbconnect.php";
   include "includes/functions.php";


   if(!isset($_SESSION['T_LOGIN'])){

   	redirect('login.php');

   }


   
		 if(isset($_POST["submit"]))  
		 {  
		 	   $teach_name= $_SESSION['tname'];
		       $class = mysqli_real_escape_string($con, $_POST["class"]);  
		       $message = mysqli_real_escape_string($con, $_POST["message"]);
		       
		       $file = $_FILES['file1']['name'];
               $tmp_file = $_FILES['file1']['tmp_name'];
               move_uploaded_file($tmp_file, "mgm/$file");

		       $sql = "INSERT INTO `notes`(`link`, `msg`, `class`, `name`) VALUES ('$file','$message','$class','$teach_name');"; 

			      if(mysqli_query($con, $sql))  
			      {  
			           redirect('success-notes.php');
			           die();
			      }  
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
<div class="main_login">
	<form action=""  method="POST" enctype="multipart/form-data">
        
        <center>
		    <select class="button1" name="class" id="class" placeholder="Class" required >
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
		    <input type="file" class="button1" name="file1" required >
		    <input type="text" class="button1" name="message" placeholder="Enter a Message.." required >
			 <br>
			<input type="submit" class="button1" id="submit" value="SEND" name="submit"/>
			  <br>
       </center>
	</form>
</div>


</body>
</html>