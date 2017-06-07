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
  <div id="wrapper">
  <div id="middle">
 
<h3 align="center">Order Details</h3>
<div class="table-responsive">
  <table class="table table-bordered" border="red" align="center">
    <tr>
	  <th  width="40%">Item Name</th>
	  <th  width="10%">Quantity</th>
	  <th  width="20%">Price</th>
	  <th  width="15%">Total</th>
	  <th  width="5%">Action</th>
	</tr>
	<?php
	if(!empty($_SESSION["shopping_cart"]))
	{
		$total=0;
		$c=0;
		foreach($_SESSION["shopping_cart"] as $key =>$value)
		{
		?>	
			
		<tr align="center">
		  <td><?php echo $value["item_name"];?></td>
		  <td><?php echo $value["item_quantity"];?></td>
		  <td>Rs.<?php echo $value["item_price"];?></td>
		  <td>Rs.<?php echo number_format($value["item_quantity"]* $value["item_price"],2);?></td>
		  <td><a href="main2.php?action=delete&id=<?php echo $value["item_id"];?>"><span class="text-danger">Remove</span></a></td>
		</tr>
		<?php

	//$q="insert into cart(item,price,Quantity)values('".$value["item_name"]."','".$value["item_price"]."','".$value["item_quantity"]."')";
    //mysqli_query($connect,$q);
	//$c=$c+1;
	?>
	
	    <?php
		   $total=$total+($value["item_quantity"] * $value["item_price"]);
		}
	}
	//print_r($_SESSION["shopping_cart"][0]["item_name"]);
	
	
		?>
		<tr>
		
		  <td colspan="3" align="right">Total</td>
		  <td align="right">Rs. <?php $_SESSION["total"]=$total; echo number_format($total,2)?> </td>
		  <td></td>
		<tr>
		</table>
	
  <h1><a href="payment.php">Proceed to payment</a></h1>
</div>

</div>
<div id="footer">2017 Final project.All Rights reserved</div>
</div>
</body>
</html>