<?php
$con = mysqli_connect("localhost","towhid","film2film","LabProject");

$productID = $_POST['productname'];
$user = $_POST['user'];
echo $productID;
echo $user;
$date=date("Y-m-d");

if($productID !=''  && $user !='')
{



$query= mysqli_query($con,"INSERT INTO orders (ProductID,UsersID,DateTime) VALUES('$productID','$user','$date')");


}
else{
	echo "<script>alert('fill up all information !')</script>"; 
}

mysqli_close($con);
header("Location:https://localhost/ecommerce/index.php?id=$user");	

?>