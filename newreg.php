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
$userid = $_POST['username'];
$password = $_POST['password'];
$secque = $_POST['secque'];
$secans = $_POST['secanswer'];
//$v=$_POST['vege'];
//$f=$_POST['fru'];
//$g=$_POST['gra'];
$_SESSION['username']=$userid;

$query1="INSERT INTO users(firstname,lastname,username,email,password,security_que,security_ans) VALUES('$fname','$lname','$userid','$email','$password','$secque','$secans')";

//execution of query
$res=mysql_query($query1,$con);
if($res)
{
$count=count($_SESSION["shopping_cart"]);
	echo $count;
	echo $_SESSION["shopping_cart"];
	for($i=0;$i<$count;$i++)
	{	
     $j=0;
	$q="insert into cart(user,item,price,Quantity)values('".$_SESSION["username"]."','".$_SESSION["shopping_cart"][$i]["item_name"]."','".$_SESSION["shopping_cart"][$i]["item_price"]."','".$_SESSION["shopping_cart"][$i]["item_quantity"]."')";
    mysql_query($q,$con);
	}
	
  /* for($i=0;$i<$count;$i++)
	{	
     $j=0;
	$q="insert into cart(user,item,price,Quantity)values('".$_SESSION["username"]."','".$_SESSION["shopping_cart"][$i][$j=$j+1]."','".$_SESSION["shopping_cart"][$i][$j=$j+1]."','".$_SESSION["shopping_cart"][$i][$j=$j+1]."')";
    mysqli_query($q,$con);
	} */	 
header('Location:cart.php');
}
else{
	die('Could not enter data: ' . mysql_error());
}
/*$n=count($v);
$m=count($f);
$o=count($g);
$a[0]=$n;
$a[1]=$m;
$a[2]=$o;
$max=max($a);
for ($x = 0; $x <= $max; $x++) {
	if($v[$x] && $f[$x] && $g[$x])
	{
	$sql="INSERT INTO products(username,vegetables,fruits,grains) values('$userid','$v[$x]','$f[$x]','$g[$x]')";
    $result=mysql_query($sql,$con);
	if($result)
		echo 'record inserted';
	else echo mysql_error();
	}
	else if($)
	else continue;
}*/
/*foreach($v as $vege)
{
	$sql="INSERT INTO products(username,vegetables) values('$userid','$vege')";
	$result=mysql_query($sql,$con);
	if($result)
		echo "vegetables inserted=".$vege;
	
}
foreach($f as $fru)
{   $sql1="select * from products where username='$userid'";
    $resu=mysql_query($sql1);
    $c=mysql_num_rows($resu);
	$x=0;
	for($x=0;$x<$c;$x++){
	$sql="INSERT INTO products(fruits) values('$f[$x]') where username='$userid'";
	$result=mysql_query($sql,$con);
	if($result)
		echo "fruit inserted=".$f[$x];
	}
	
}
foreach($g as $gra)
{   $sql1="select * from products where username=$userid";
    $c=mysql_num_rows($sql1);
	$x=0;
	for($x=0;$x<$c;$x++){
	$sql="INSERT INTO products(grains) values('$g[$x]') where username='$userid'";
	$result=mysql_query($sql,$con);
	if($result)
		echo "fruit inserted=".$f[$x];
	}
}
foreach($f as $fru)
{
	$sql="INSERT INTO products(username,fruits) values('$userid','$fru')";
	$result=mysql_query($sql,$con);
	if($result)
		echo "fruits inserted=".$fru;
	
}
foreach($g as $gra)
{
	$sql="INSERT INTO products(username,grains) values('$userid','$gra')";
	$result=mysql_query($sql,$con);
	if($result)
		echo "grains inserted=".$gra;
	
}



	
*/	




	



//$result = mysql_query("SELECT userid, password FROM users");

//fetch tha data from the database
//while ($row = mysql_fetch_array($result)) {
   //echo "USERID:".$row['userid']."<br>";
   // echo " Password:".$row['password']."<br>"; 
 //  }


mysql_close($con);
}
else echo 'sss';
?>

