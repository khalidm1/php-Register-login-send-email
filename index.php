<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">

        <style>
input, textarea {
  display: block;
  padding: 10px;
  width: 400px;
  margin-bottom: 15px;
  border: 1px solid lightgray;
  font-size: 15px;
  outline: none;
  font-family: "Raleway", sans-serif;
  -webkit-transition: all .25s;
     -moz-transition: all .25s;
      -ms-transition: all .25s;
       -o-transition: all .25s;
          transition: all .25s;
}
input:focus, textarea:focus {
  box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.19);
}
form button {
  border: none;
  padding: 10px 83px;
  font-size: 20px;
  background-color: black;
  color: #fff;
  font-weight: 700;
  font-family: "Raleway", sans-serif;
  margin-bottom: 40px;
  cursor: pointer;
  text-transform: uppercase;
  letter-spacing: 1px;
}
textarea {
  height: 150px;
}
</style>
    
    
  

</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		

<br>
<!--- Begin Content --->
<center>
<h3>Contact Form</h3>
<br>
<form action="sendmail/sendmail.php" method="post">
  <input type="text" name="name" id="" placeholder="Your Name" required>
<br>
  <input type="email" name="email" id="" placeholder="E-mail Address" required>
<br>
  <textarea name="message" id="" cols="30" rows="10" placeholder="Type Your Message" required></textarea>
<br>
  <button type="submit">Send</button>
</form>
<br>
</center>
<br>
<br>


</body>
</html>