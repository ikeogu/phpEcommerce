<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Jhotpot</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
     <?php if(isset($_GET['id']) && $_GET['id'] != ''){
		 $loginButton =<<<heredoc
		 <style>#login{visibility:hidden;}</style> 
heredoc;
         echo $loginButton;

		 
	 } 
	 else{$logoutButton =<<<heredoc
		 <style>#logout{visibility:hidden;}</style> 
heredoc;
         echo $logoutButton;}?>
		 

</head>

<body>

<!-- header  -->
<?php 

	include ("navsearch.php");


?>





<section id="product">

<div class="container">

	
 <!-- form  -->
 <h2>WE ARE JHOTPOT</h2>

 <div style="border-left:2px solid rgb(24, 188, 156); padding:10px 10px ;margin-top:30px;">
 
<h3>Products</h3>
<h5>
We sell quality product in best price.
</h5>

<h3>Customer Service</h3>
<h5>We have 24X7 open customer service.</h5>

<h3>Delivery System</h3>
<h5>We have cash on delivery system. We provide free home delivery.</h5>

<h3>Warranty</h3>
<h5>We have 7 days replacement warranty.</h5>

<h3>Contact:</h3>
<h5>Dhaka,Bangladesh.</h5>
<h5>mobile:01521492866</h5>
<h5>eMail:jhotpot@gmail.com</h5> 

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




