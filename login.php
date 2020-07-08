<?php
   session_start();
   include "config/dbconnect.php";
   include "includes/functions.php";
   $msg ="";

    if(isset($_SESSION['IS_LOGIN'])){

    redirect('index.php');

   }

   if(isset($_POST['submit'])){

          $email = mysqli_real_escape_string($con,$_POST['email']);
          $pass =  mysqli_real_escape_string($con,$_POST['pass']); 

         $sql = "SELECT * FROM student WHERE email='$email' AND password='$pass';";

         $query = mysqli_query($con, $sql);  

         if ($query) {
             if (mysqli_num_rows($query)>0) {
                 
                $row = mysqli_fetch_assoc($query);
                $_SESSION['IS_LOGIN'] = 'yes';
                $_SESSION['class'] = $row['class'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['mobile'] = $row['mobile'];


                redirect('index.php');
             }else{

                 $msg ="Invalid Login !";
             } 
         }

      }
    

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="manifest" href="./manifest.json">
  <link rel="apple-touch-icon" href="./img/logo-72.png">
  <meta name="apple-mobile-web-app-status-bar" content="#ffff">
  <link rel='icon' href='img/favicon.ico' type='image/x-icon'/ > 
</head>
<body>

<nav class="head">

     <h4 class="head_text">LOGIN</h4>

</nav>

<br>
<br>
<br>
<div class="main_login">
 <h4 class="head_text">STUDENT LOGIN</h4>
	<form action="" method="post">

		<input type="text" class="button1" name="email" placeholder="Email" required />
		<input type="password" class="button1"name="pass" placeholder="Password" required />
		<br>
		<input type="submit" name="submit"class="button1" value="LOGIN"/>

	</form>
  <div style="color: red;"><?php echo $msg; ?></div>
	<h4 class="head_text">OR</h4>
    <a href="register.php" class="nav__link">REGISTER</a>

</div>


</body>
</html>
