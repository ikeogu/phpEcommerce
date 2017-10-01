<?php
$con = mysqli_connect("localhost","towhid","film2film","LabProject");

$productname = $_POST['productname'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$date=date("Y-m-d");

if($mobile !=''  && $address !=''&& $name !='')
{



$query= mysqli_query($con,"INSERT INTO guest (productid,name,mobile,address,date) VALUES('$productname','$name','$mobile','$address','$date')");


}
else{
	echo "<script>alert('fill up all information !')</script>"; 
}

mysqli_close($con);
header("Location:https://localhost/ecommerce/index.php");	

?>