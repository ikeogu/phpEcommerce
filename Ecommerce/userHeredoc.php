<head>
	<meta charset="utf-8">
	<title>Jhotpot</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- Optional theme 
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
	

</head>

<?php
include("db/dbConnection.php");

$query= "";
if(isset($_GET['s']) && $_GET['s']!=''){
	$search=$_GET['s'];
	$query= "select * from product WHERE ProductName LIKE '%$search%' OR ProductDescription LIKE '%$search%' ";
}
else{
$query= "select * from product";
}

$result =mysqli_query($dbcon,$query) or die('Error: ' . mysqli_error($dbcon));;
$encode = array();
$information='';
while($row = mysqli_fetch_assoc($result)) {
   $encode[] = $row;
}

$result=json_encode($encode); 
$result=json_decode($result);
$userID='';
if(isset($_GET['id']))
{$userID=$_GET['id'];}
foreach($result as $product){
	
$imageLink=$product->ProductImage;
$productName=$product->ProductName;
$productID=$product->ProductID;
$productPrice=$product->ProductPrice;
//$longDescription=$product->ProductDescription;
	
$information = <<<ENDHEREDOC

<div class="col-lg-4 col-md-4 col-sm-4 mb"O>
			<div class="product-panel-2 pn">			
				<img src="$imageLink" alt="" height="250">
				<h5 class="mt">$productName</h5>
				<h5>PRICE: $productPrice tk</h5>
				<div class="row">
				<a class="btn btn-small btn-theme04" data-toggle="" href="detail.php?p=$productID&id=$userID">Detail</a>
				
				<form action="orderdb.php" method="post" >
				<input type="hidden" name="productname" value="$productID">
				<input type="hidden" name="user" value="$userID">
				<button class="btn btn-small btn-theme01" type="submit" name="submit">
				<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"  ></span> ORDER NOW!</button>
				</form>
				</div>
			</div>
	</div>
	




ENDHEREDOC;


echo $information;
}
if($information==''){
   echo ('<h2>Product not found !</h2>');
}
	
mysqli_close($dbcon);

?>


