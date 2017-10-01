<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Jhotpot</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- css for hidden login and logout --->
     <?php if(isset($_GET['id']) && $_GET['id']!=''){
		 $loginButton =<<<heredoc
		 <style>#login{visibility:hidden;}</style> 
heredoc;
         echo $loginButton;

		 
	 } 
	 else{$logoutButton =<<<heredoc
		 <style>#logout{visibility:hidden;}</style> 
heredoc;
         echo $logoutButton;}?>
		 
		 
		 <!-- -->
		 

		 

</head>

<body>

<!-- header  -->
<?php 

	include ("navsearch.php");


?>




<section >

<div class="container">
<div class="row">
<div class="col-lg-4" style="text-align: center;" >
<?php 
include("db/dbConnection.php");
//$id= $_GET['id'];
$p= $_GET['p'];

$query= "select * from product where ProductID=$p";


if ($result = mysqli_query($dbcon,$query))
  {
  while ($obj=mysqli_fetch_object($result))
    {
    $imageLink=$obj->ProductImage;
$productName=$obj->ProductName;
$productID=$obj->ProductID;
$productPrice=$obj->ProductPrice;
$longDescription=$obj->ProductDescription;
if(isset($_GET['id']) && $_GET['id'] !=''){
	$userID=$_GET['id'];
	
	$information = <<<ENDHEREDOC
<img height="320" src="$imageLink"  ></img>	


<form action="orderdb.php" method="post">
				<input type="hidden" name="productname" value="$productID">
				<input type="hidden" name="user" value="$userID">
				<button class="btn btn-small btn-theme01" type="submit" name="submit" style="margin-top:20px;">
				<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"  ></span> ORDER NOW!</button>
				</form>
</div>


<div class="col-lg-6" style="border-left:2px solid rgb(24, 188, 156);margin-left:80px;">
<h2>$productName</h2>
<h4>Price=$productPrice tk</h4>

        <div class="col-md-5" style="text-align: center;">
		<dt style="margin-bottom:30px;"> $longDescription
		</dt>
		</div>


ENDHEREDOC;
}
else{
	$information = <<<ENDHEREDOC
<img height="320" src="$imageLink"  ></img>	
<br>

<button class="btn btn-small btn-theme01" data-toggle="modal" data-target="#modal" style="margin-top:20px;">
				<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"  ></span> ORDER NOW!</button>
</div>


<div class="col-lg-6" style="border-left:2px solid rgb(24, 188, 156);margin-left:80px;">
<h2>$productName</h2>
<h4>Price=$productPrice tk</h4>

        <div class="col-md-5" style="text-align: center;">
		<dt style="margin-bottom:30px;"> $longDescription
		</dt>
		</div>

		<!-- form  -->
<div class="modal fade" id="modal" role="dialog">
   

   <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Order form</h4>
        </div>
       <div class="modal-body" >
				<form class="contact" action="db.php" name="contact"  method="POST" enctype="multipart/form-data">
				  
					<input type="hidden" name="productname" value="$productID"><br>
					Your Name :<br>
					<input type="text" name="name" class="input-xlarge"><br>
					Your Mobile No: <br>
					<input type="mobile" name="mobile" class="input-xlarge"><br>
					Your Address: <br>
					<textarea name="address" class="input-xlarge" placeholder="যে ঠিকানায় পণ্য যাবে" ></textarea><br><br>
					<input class="btn btn-success" type="submit" value="Send!" >
					
				</form>
			</div>
         
        
		 <div class="modal-footer">
		
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
	</div>
</div>

ENDHEREDOC;
	
}
	

echo $information;
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($dbcon);

?>





		

</div>
</div>

</div>

</section>

	<?php
	
	 include("footer.php");
	?>	
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/JS.js"></script>
	
<script src="js/bootstrap.min.js"></script>
</body>	
</html>




