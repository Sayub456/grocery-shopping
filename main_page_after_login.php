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
		    'item_quantity' =>$_POST["quantity"],
			//'item_image' =>$_POST["image"]
			);
			/*$i=0;
			$cart=unserialize(serialize($_SESSION['shopping_cart']));
			$q="INSERT INTO cart(id)values($cart[$i]->id)";
			mysqli_query($connect,$q);
			
	        $q="INSERT INTO cart(item)values($cart[$i])";
			mysqli_query($connect,$q);
           
			$q="INSERT INTO cart(price)values($cart[$i])";
			mysqli_query($connect,$q);
	        
			$q="INSERT INTO cart(Quantity)values($cart[$i])";
			mysqli_query($connect,$q);
	        $i=$i+1;	*/        
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
		'item_quantity' =>$_POST["quantity"],
		//'item_image' =>$_POST["image"]
		);
		//$q="INSERT INTO cart(id,item,price,Quantity)VALUES($item_array[item_id],$item_array[item_name],$item_array[item_price],$item_array[item_quantity])";
		//	mysqli_query($connect,$q);
	        
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
	<li><a href="main_page_after_login.php">Home</a></li>
	<li><a href="vegetables.php">Vegetables</a></li>
	<li><a href="fruits.php">Fruits</a></li>
    <li><a href="grains.php">Grains</a></li>
	
	
	<li style="float:right"><a href="Contact.html">Contact Us</a></li>
	<li style="float:right"><a href="" class="btn btn-info btn-lg">Cart</a></li>
	
	
   </ul>
 </div>
  <div id="search">
   <ul>
    <li><input type="text" class="input_search" placeholder="Search anything" name="item_to_search"></li>

	<li style="float:right"><button type="submit" class="search_btn" name="search" onClick="showItems()">Search</button></li>
	/* <?php
 function showItems(){
	
  $query="SELECT * FROM tbl_products where item like '%item_to_search%'";
  $result=mysqli_query($connect,$query);
  $c=0;
  if(mysqli_num_rows($result)>0)
  {
  while($row =mysqli_fetch_array($result))
  {
	    
    
  ?>
  <div class="img">
    <form method="post" action="main2.php?action=add&id=<?php echo $row["id"];?>">
	
    
    <img src="<?php echo $row["image"];?>" alt="Trolltunga Norway">
	
    <div class="desc"><?php echo $row["name"];?> </div>
	
	<div class="desc" ><?php echo $row["price"];?></div>
	
	<input type="text" name="quantity" class="form-control" value="1"/>
	<input type="hidden" name="hidden_image" value=<?php $row['price'] ?> />
	<input type="hidden" name="hidden_name" value="<?php echo $row['name']?>" />
	<input type="hidden" name="hidden_price" value="<?php echo $row['price']?>" />
	<button type="submit" name="add_to_cart" value="Add to Cart" >Add to Cart</button>
	</form>
  </div>
  <?php
  }
  }
  
 }
  ?>
	 */
  
    </ul>
  </div>
</div>
  <div id="wrapper">
  <div id="middle">
  <?php
  $query="SELECT * FROM tbl_products ORDER BY id ASC";
  $result=mysqli_query($connect,$query);
  $c=0;
  if(mysqli_num_rows($result)>0)
  {
  while($row =mysqli_fetch_array($result))
  {
	  if($row["id"]<=12)
	  {
		  
    
  ?>
  <div class="img">
    <form method="post" action="main2.php?action=add&id=<?php echo $row["id"];?>">
	
    
    <img src="<?php echo $row["image"];?>" alt="Trolltunga Norway">
	
    <div class="desc"><?php echo $row["name"];?> </div>
	
	<div class="desc" ><?php echo $row["price"];?></div>
	
	<input type="text" name="quantity" class="form-control" value="1"/>
	<input type="hidden" name="hidden_image" value=<?php $row['price'] ?> />
	<input type="hidden" name="hidden_name" value="<?php echo $row['name']?>" />
	<input type="hidden" name="hidden_price" value="<?php echo $row['price']?>" />
	<button type="submit" name="add_to_cart" value="Add to Cart" >Add to Cart</button>
	</form>
  </div>
  <?php
  }
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
	/* $count=count($_SESSION["shopping_cart"]);
	echo $count;
	for($i=0;$i<$count;$i++)
	{	
	$q="insert into cart(item,price,Quantity)values('".$_SESSION["shopping_cart"][$i]["item_name"]."','".$_SESSION["shopping_cart"][$i]["item_price"]."','".$_SESSION["shopping_cart"][$i]["item_quantity"]."')";
    mysqli_query($connect,$q);
	}
	 */
		?>
		<tr>
		  <td colspan="3" align="right">Total</td>
		  <td align="right">Rs. <?php echo number_format($total,2)?> </td>
		  <td></td>
		<tr>
	
  </table>
</div>

</div>
<div id="footer">2017 Final project.All Rights reserved</div>
</div>
</body>
</html>