<?php

$mysql_host = "mysql16.000webhost.com";
$mysql_database = "a8229885_project";
$mysql_user = "a8229885_towhid";
$mysql_password = "film2film";
$con = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);







$result= mysqli_query($con,"SELECT * FROM CUSTOMER");



while($row = mysqli_fetch_array($result)){
	echo "<h1>PRODUCT NAME = ".$row['productname']." </h1><br> ";
	echo "<h1> NAME = ".$row['name']." </h1><br> ";
	echo "<h1>mobile = ".$row['mobile']." </h1><br> ";
	echo "<h1>address = ".$row['address']." </h1><br> ";
	echo "............................................<br> ";
	
	
}
mysqli_close($con);
	

?>