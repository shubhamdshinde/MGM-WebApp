<?php
   session_start();
   include "config/dbconnect.php";
   include "includes/functions.php";
   $msg ="";

    if(isset($_SESSION['T_LOGIN'])){

    redirect('index.php');

   }

   if(isset($_POST['submit'])){

          $email = mysqli_real_escape_string($con,$_POST['email']);
          $pass =  mysqli_real_escape_string($con,$_POST['pass']); 

         $sql = "SELECT * FROM teacher WHERE email='$email' AND password='$pass';";

         $query = mysqli_query($con, $sql);  

         if ($query) {
             if (mysqli_num_rows($query)>0) {
                 
                $row = mysqli_fetch_assoc($query);
                $_SESSION['T_LOGIN'] = 'yes';
                $_SESSION['tname'] = $row['name'];
                $_SESSION['temail'] = $row['email'];
                $_SESSION['tmobile'] = $row['mobile'];


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
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel='icon' href='img/favicon.ico' type='image/x-icon'/ >
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

</head>
<body>

<nav class="head">

     <h4 class="head_text">LOGIN</h4>

</nav>

<br>
<br>
<br>
<div class="main_login">
 <h4 class="head_text">MGM STAFF LOGIN</h4>
	<form action="" method="post">

		<input type="text" class="button1" name="email" placeholder="Email" required />
		<input type="password" class="button1"name="pass" placeholder="Password" required />
		<br>
		<input type="submit" name="submit"class="button1" value="LOGIN"/>

	</form>
  <div style="color: red;"><?php echo $msg; ?></div>
	<h4 class="head_text">OR</h4>
    <a href="#" class="nav__link">BACK TO STUDENT LOGIN</a>

</div>


</body>
</html>
