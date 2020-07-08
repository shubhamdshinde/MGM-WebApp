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

     <h4 class="head_text">Hi, <?php echo $_SESSION['tname']; ?></h4>
     <br>
	   <a href="create-notes.php" class="nav__link ">
		    <i class="material-icons nav__icon">add </i>
	  </a>


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

		   $sql = "SELECT * FROM notes WHERE id ORDER BY id DESC;";
	       $result = mysqli_query($con, $sql);
		          // $resultCheak = mysqli_num_rows($result);
		           // if ($resultCheak > 0) {
		          while ($row = mysqli_fetch_array($result)) { 

		             $message = $row['msg'];
		             $name = $row['name'];
		             $link = $row['link'];
					 $class = $row['class'];
		             $sub_date = $row['sub_date'];
		             $sub_date = date('d M h:m',strtotime($sub_date));
		              
		    // } 

	   ?>
	 <li>
	 	<h4 class="head_text"> TO <?php echo $class ?></h4>
	   <div class="msg-bubble">  
	         <div class="msg-info">
	           <div class="msg-info-name"><?php echo $name; ?></div>
	           <div class="msg-info-time"><?php echo $sub_date; ?></div>
	         </div>

	        <div class="msg-text">
	        	<?php echo $message; ?>
	           <BR>
	           <BR>
	           <a href="mgm/<?php echo $link; ?>">Download</a>
	        </div>
	      </div>
	    </div>
	  </li> 
	  <br>

	<?php } ?>

	</ul> 

</body>
</html>