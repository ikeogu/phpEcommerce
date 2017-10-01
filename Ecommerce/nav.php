	
		<div class="navbar navbar-default navbar-fixed-top navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="" class="navbar-brand"><img src="logo.png" /></a>
				</div>
				<div class="collpase navbar-collapse navbar-right" id="example">

					<ul class="nav navbar-nav" >
						<li><a href="index.php" class="active">Home</a></li>
						<!--<li><a href="">Order</a></li> -->
						<li ><a target="_blank" href="about.php">About us</a></li>
						<li id="name"style="background:rgb(24, 188, 156) none repeat scroll 0% 0%; color:rgb(255, 242, 0);border-radius: 6px; font-size:15px; padding:5px 5px;margin-top:10px; margin-right:8px;">
						    <?php if(isset($_GET['id']) && $_GET['id']!=''){
								
						    $userID=$_GET['id'];
							include("db/dbConnection.php");  
								
							$check_user="select * from Users WHERE UserID='$userID'";  
      
                            $query=mysqli_query($dbcon,$check_user);  
      
        if(mysqli_num_rows($query))  
        {  
	        $resultID=@mysqli_fetch_object($query);
	        $resultID=$resultID->LastName;
			 
            echo $resultID;
            mysqli_close($dbcon);
			
            
        }  
							} ?>
						</li>
						
						
						<a id="login" href="login.php" class="btn btn-primary" role="button" style="padding:5px 8px;margin-top:10px;">Login</a>
						<a id="logout" href="logout.php" class="btn btn-danger" role="button" style="padding:5px 8px;margin-top:10px;">Logout</a>
						
						
					</ul>
					<ul class="nav navbar-nav" >
					    <li></li>
					</ul>

					
				</div>

			</div>
		</div>