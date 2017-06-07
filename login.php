<?php
session_start();


// connection with database server
$con= mysql_connect("localhost", "root", "");
echo "Server connection established";

//connection with database

$selected = mysql_select_db("miniproject",$con);


$user = $_POST['username'];
$password = $_POST['password'];
//$query1="INSERT INTO Custs(username,email,password,security_que,security_ans) VALUES('$userid,'$email','$pssword','$secque','$secans');

//execution of query
//
//echo "Record Inserted";

if(isset($_POST['submit'])){
$result = mysql_query("SELECT * FROM users where username='$user' and password='$password'");
$num=mysql_num_rows($result);
if($num==1)
{
	$row=mysql_fetch_assoc($result); 
    $_SESSION['username']=$user;
	$count=count($_SESSION["shopping_cart"]);
	echo $count;
	for($i=0;$i<$count;$i++)
	{	
	$q="insert into cart(user,item,price,Quantity)values('".$_SESSION["username"]."','".$_SESSION["shopping_cart"][$i]["item_name"]."','".$_SESSION["shopping_cart"][$i]["item_price"]."','".$_SESSION["shopping_cart"][$i]["item_quantity"]."')";
    mysqli_query($connect,$q);
	}
	
    //echo "you have been logged in <br>$user</br>. <a href='./member.html'>Click here</a>to go to member page.";
     header('Location:cart.php');                                      
	
}
else{
	echo 'incorrect username or password';
}
}
//$res=mysql_query($query1);
//if($result==$pssword)
//fetch tha data from the database
//while ($row = mysql_fetch_array($result)) {
   //echo "USERID:".$row['userid']."<br>";
   // echo " Password:".$row['password']."<br>"; 
 //  }


mysql_close($con);

?>
