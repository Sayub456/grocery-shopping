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
	<li><a href="Vegetables.html">Vegetables</a></li>
	<li><a href="Fruits.html">Fruits</a></li>
    <li><a href="Grains.html">Grains</a></li>
	
	
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
  <div id="wrapper">
  <div id="middle">
  <h3 align="center">Hi <?php echo $_SESSION["username"]?> !...</h3>
  
 <form action="successful.php" method="post">
  <label><b><center>Total amount to pay... Rs. <?php echo $_SESSION["total"] ?></center></b></label>
  <br>
  
 <label><b>We are providing cash on delivery...</b></label>
   <br>
   <label><b>Address 1</b></label>
  <input type="text" name="address1" value="9 Elm Street">
  
  <label><b>Address 2</b></label>
  <input type="text" name="address2" value="Apt 5">
  <br>
  <label><b>City</b></label>
  <input type="text" name="city" value="Berwyn">
  <label><b>State</b></label>
  <input type="text" name="state" value="PA">
  <label><b>zip</b></label>
  <input type="text" name="zip" value="19312">
  <br>
  <label><b>Phone 1</b></label>
  <input type="text" name="night_phone_a" value="610">
  
  <label><b>Phone 2</b></label>
  <input type="text" name="night_phone_c" value="1234">
  <br>
  <label><b>Email</b></label>
  <input type="text" name="email" value="jdoe@zyzzyu.com">
  
  
  
  <input type="submit" name="submit" value="Pay...">
  
  
    <h3 align="center">"FRESHOS.. - The safer, easier way to buy"</h3>
</form>



</div>

</div>
<div id="footer">2017 Final project.All Rights reserved</div>
</div>
</body>
</html>