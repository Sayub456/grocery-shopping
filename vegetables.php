<?php
session_start();
$connect=mysqli_connect("localhost","root","","miniproject");
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id =array_column($_SESSION["shopping_cart"],"item_id");
		if(!in_array($_GET["id"],$item_array_id))
		{
			$count=count($_SESSION["shopping_cart"]);
			$item_array=array(
			'item_id' =>$_GET["id"],
		    'item_name' =>$_POST["hidden_name"],
		    'item_price' =>$_POST["hidden_price"],
		    'item_quantity' =>$_POST["quantity"]
	        );
			$_SESSION["shopping_cart"][$count]=$item_array;
		}
		else{
			
			echo '<script>alert("Item Already Added")</script>';
			echo '<script>window.location="main2.php"</script>';
		}
	
		
	}
	else
	{
		$item_array=array(
		'item_id' =>$_GET["id"],
		'item_name' =>$_POST["hidden_name"],
		'item_price' =>$_POST["hidden_price"],
		'item_quantity' =>$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0]=$item_array;
	}
}
if(isset($_GET["action"]))
{
	if($_GET["action"]=="delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys=>$value)
		{
			if($value["item_id"]==$_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("item Removed")</script>';
				echo '<script>window.location="main2.php"</script>';
				
			}
		}
	}
	
}

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
  <?php
  $query="SELECT * FROM tbl_products where type='v' ORDER BY id ASC ";
  $result=mysqli_query($connect,$query);
  $c=0;
  if(mysqli_num_rows($result)>0)
  {
  while($row =mysqli_fetch_array($result))
  {
	  
  ?>
  <div class="img">
    <form method="post" action="vegetables.php?action=add&id=<?php echo $row["id"];?>">
    
    <img src="<?php echo $row["image"];?>" alt="Trolltunga Norway">
    
    <div class="desc"><?php echo $row["name"];?></div>
	<div class="desc"><?php echo $row["price"];?></div>
	<input type="text" name="quantity" class="form-control" value="1"/>
	<input type="hidden" name="hidden_name" value="<?php echo $row['name']?>" />
	<input type="hidden" name="hidden_price" value="<?php echo $row['price']?>" />
	
	<button name="submit" name="Add to cart">Add-to-Cart</button>
	</form>
  </div>
  <?php
  
  }
  }
  ?>
  <div style="clear:both"></div>
<br />
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
		   $total=$total+($value["item_quantity"]* $value["item_price"]);
		}
	}
		?>
		<tr>
		  <td colspan="3" align="right">Total</td>
		  <td align="right">Rs. <?php echo number_format($total,2)?></td>
		  <td></td>
		<tr>
	
  </table>
</div>
<h3 align="center" ><a href="signin.html"> Sign in to Proceed</a></h3>
<h3 align="center" ><a href="register.html"> New user? Click here to Register</a></h3>


</div>
  
  
<div id="footer">2017 Final project.All Rights reserved</div>
</div>
</body>
</html>