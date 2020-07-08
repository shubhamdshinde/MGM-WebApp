<?php
   include "config/dbconnect.php";
   include "includes/functions.php";
   $msg ="";

   if(isset($_POST['submit'])){

          $email = mysqli_real_escape_string($con,$_POST['email']);
          $pass = mysqli_real_escape_string($con, $_POST['pass']);
          $mobile =  mysqli_real_escape_string($con,$_POST['mobile']);
          $name =  mysqli_real_escape_string($con,$_POST['name']);
          $class =  mysqli_real_escape_string($con,$_POST['class']);

         $sql = "INSERT INTO `student` (`name`, `email`, `password`, `mobile`, `class`) VALUES ('$name', '$email', '$pass', '$mobile', '$class');";

         $query = mysqli_query($con, $sql);  

         if ($query) {
            
                 redirect('index.php');

             }else{

                 $msg ="error to login !";
             } 
         

      }
    

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
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

     <h4 class="head_text">REGISTER</h4>

</nav>
<br>
<br>
<div class="main_login">
  <h4 class="head_text">REGISTER</h4>

	<form action="" method="POST">

        <input type="text" class="button1" name="name" placeholder="Name" required />
		<input type="text" class="button1" name="email" placeholder="Email" required />
		<input type="password" class="button1"name="pass" placeholder="Password" required />
		<input type="text" class="button1" name="mobile" placeholder="Mobile" maxlength="10" required />		
    <select class="button1" name="class" placeholder="Class" required >
      <option value="" >SELECT BATCH</option>
      <option value="FY BCS A">FY BCS A</option>
      <option value="FY BCS B">FY BCS B</option>
      <option value="SY BCS A">SY BCS A</option>
      <option value="SY BCS B">SY BCS B</option>
      <option value="TY BCS A">TY BCS A</option>
      <option value="TY BCS B">TY BCS B</option>
   </select>
		<br>
		<input type="submit" class="button1" value="REGISTER" name="submit"/>
		
	</form>
		<h4 class="head_text">OR</h4>
    <a href="login.php" class="nav__link">LOGIN</a>

</div>




</body>
</html>