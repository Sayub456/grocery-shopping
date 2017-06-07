<?php
session_start();
$connect=mysqli_connect("localhost","root","","miniproject");
?>
<html>
<head>
<title>
Welcome
</title>
<meta name="description" content="Online grocery shopping"/>
<meta name="keywords" content="vegetables, fruits, pulses"/>
<meta name="auther" content="snk"/>
<link rel="stylesheet" href="style1.css" type="text/css"/>
</head>
<body>
<div id="header">
<img src="gr1.jpeg" class="img-rounded" alt="Store" width="1160" height="400"> 
  <div id="nav">
    <ul>
	<li><a href="main2.php">Home</a></li>
	<li><a href="vegetables.php">Vegetables</a></li>
	<li><a href="fruits.php">Fruits</a></li>
    <li><a href="grains.php">Grains</a></li>
	
	
	<li style="float:right"><a href="Contact.html">Contact Us</a></li>
	<li style="float:right"><a href="" class="btn btn-info btn-lg">Cart</a></li>
	<li style="float:right"><a href="Register.html">SignUp</a></li>
	<li style="float:right"><a href="signin.html">Login</a></li>
   </ul>
 </div>
  <div id="search">
   <ul>
    <li><input type="text" class="input_search" placeholder="Search anything" name="item"></li>

	<li style="float:right"><button type="submit" class="search_btn">Search</button></li>
    </ul>
  </div>
</div>
  
  <div id="middle">
  <h3 align="center">Hi <?php echo $_SESSION["username"]?> !...</h3>
  <h4><center>Hey... We have recorded your details products will be provided to you on your door step..</center></h4>
 



</div>

</div>
<div id="footer">2017 Final project.All Rights reserved</div>
</body>
</html>