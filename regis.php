<?php
session_start();
// connection with database server
$con= mysql_connect("localhost", "root", "");
if($con)
echo "Server connection established";

//connection with database

$selected = mysql_select_db("miniproject",$con);
if($selected)
	echo "database selected";
else 
{
	die('database couldnt be selected ' . mysql_error());
}

if(isset($_POST['submit']))
{
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$secque = $_POST['secque'];
$secans = $_POST['secans'];
$_SESSION['username']=$userid;

$query1="INSERT INTO users(firstname,lastname,username,email,password,security_que,security_ans) VALUES('$fname','$lname','$userid','$email','$password','$secque','$secans')";

//execution of query
$res=mysql_query($query1,$con);
if($res)
{
$count=count($_SESSION["shopping_cart"]);
	echo $count;
	for($i=0;$i<$count;$i++)
	{	
	$q="insert into cart(user,item,price,Quantity)values('".$_SESSION["username"]."','".$_SESSION["shopping_cart"][$i]["item_name"]."','".$_SESSION["shopping_cart"][$i]["item_price"]."','".$_SESSION["shopping_cart"][$i]["item_quantity"]."')";
    mysqli_query($connect,$q);
	}
	
header('Location:cart.php');
}
else{
	die('Could not enter data: ' . mysql_error());
}
mysql_close($con);
}
else echo 'sss';
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
	<li><a href="main1.html">Home</a></li>
	<li><a href="Vegetables.html">Vegetables</a></li>
	<li><a href="Fruits.html">Fruits</a></li>
    <li><a href="Grains.html">Grains</a></li>
	
	
	<li  style="float:right"><a href="Contact.html">Contact Us</a></li>
	<li style="float:right"><a href="#" class="btn1 btn4 btn-1 btn1-1b">Cart</a></li>
	
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
 <form action="action_page.php">
  <div class="imgcontainer">
    <img src="avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
  <form method="post">
    <label><b>Firstname</b></label>
    <input type="text" placeholder="Enter Username" name="fname" required>

    <label><b>Lastname</b></label>
    <input type="text" placeholder="Enter Lastname" name="lname" required>
 
    <label><b>Username</b></label>
    <input type="text" placeholder="Username" name="username" required>
	
	<label><b>Email</b></label>
    <input type="email" placeholder="Email" name="email" required>


	<label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

	<label><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter Same Password " name="psw" required>
     
	<label><b>Security question</b></label>
    <input type="text" placeholder="Security Question" name="secque" required>

	<label><b>Security Answer</b></label>
    <input type="text" placeholder="Security Answer" name="sacans" required>

     <button type="submit" name="submit">Register</button>
	
    </form>
  </div>

  <!-- <div class="container" style="background-color:#f1f1f1">
    <button align="center" type="button" class="cancelbtn"><a href="main2.php">Cancel</a></button>
    
  </div> -->

</div>
<div id="footer">2017 Final project.All Rights reserved </div>
</div>
</body>
</html>