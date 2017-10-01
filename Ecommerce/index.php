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

 
 <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="phone.png" alt="">
                    
                        
                    
                </div>
            </div>
        </div>
</header>

<!-- ------------  -->


<section id="product">

<div class="container">

	
 <!-- form  -->
		
    
	
	<?php
	
	if(isset($_GET['id']) && $_GET['id'] !=''){
	include("userHeredoc.php");}
	else{include("heredoc.php");}
	?>
	
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




