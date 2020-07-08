<?php
   session_start();
   include "config/dbconnect.php";
   include "includes/functions.php";

   $class=$_SESSION['class'];

   if(!isset($_SESSION['IS_LOGIN'])){

   	redirect('login.php');

   }
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Notice</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/notice.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="manifest" href="./manifest.json">
    <link rel="apple-touch-icon" href="./img/logo-72.png">
    <meta name="apple-mobile-web-app-status-bar" content="#ffff">
    <link rel='icon' href='img/favicon.ico' type='image/x-icon'/ >
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
 
</head>
<body>
	
<nav class="head">

     <h4 class="head_text">Hi, <?php echo $_SESSION['name']; ?></h4>
     <h4 class="head_text"><?php echo $_SESSION['class']; ?></h4>
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

	<ul>
     	<br>
     	<br>
     	<br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>

		<?php       

		   $sql = "SELECT * FROM notice WHERE class ='$class' ORDER BY id DESC;";
	       $result = mysqli_query($con, $sql);
		          // $resultCheak = mysqli_num_rows($result);
		           // if ($resultCheak > 0) {
		          while ($row = mysqli_fetch_array($result)) { 

		             $message = $row['message'];
		             $name = $row['name'];
		             $submission_date = $row['submission_date'];
		             $submission_date = date('d M h:m',strtotime($submission_date));
		              
		    // } 

	    ?>
	 <li>

		<div class="msg-bubble">
	         <div class="msg-info">
	           <div class="msg-info-name"><?php echo $name; ?></div>
	           <div class="msg-info-time"><?php echo $submission_date; ?></div>
	         </div>

	        <div class="msg-text">
	          <?php echo $message; ?>
	        </div>
	      </div>
	    </div>

	  </li> 
	  <br>

	<?php } ?>

	</ul> 
	<br>


</body>
</html>