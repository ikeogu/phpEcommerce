
    <?php  
    session_start();//session starts here  
      
    ?>  
      
      
      
    <html>  
    <head lang="en">  
    <meta charset="utf-8">
	<title>Jhotpot</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	
	<script type="text/javascript" src="js/jquery.js"></script>
	
		<script>
	$(document).ready(function() {
    //listens for typing on the desired field
    $("#email").keyup(function() {
        //gets the value of the field
        var email = $("#email").val();

        //here would be a good place to check if it is a valid email before posting to your db

        
        
        //here is where you send the desired data to the PHP file using ajax
        $.post("checkingEmail.php", {email:email},
            function(result) 
			{
                if(result == 1) {
                    //the email is available
                    $("#email_status").html("Not exist");
					//document.getElementById("button").disabled = true;
                }
                else {
                    //the email is not available
                    $("#email_status").html("ok");
					//document.getElementById("button").disabled = false;
                }
            });
        });
    });
	
	</script>
	
    </head>  
    <style>  
        .login-panel {  
		margin-top: 150px;  }
      
    </style>  
      
    <body>  
      
     <?php include ("nav.php"); ?>
	 
    <div class="container">  
        <div class="row">  
            <div class="col-md-4 col-md-offset-4">  
                <div class="login-panel panel panel-success">  
                    <div class="panel-heading">  
                        <h3 class="panel-title">Login </h3>  
                    </div>  
                    <div class="panel-body">  
                        <form role="form" method="post" action="login.php">  
                            <fieldset>  
							
                                <div class="form-group"  >  
                                    <input class="form-control" id="email" placeholder="E-mail" name="email" type="email"  autofocus>
                                    <span id="email_status"></span>									
                                </div>  
								
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="">  
                                </div>  
      
      
                                <input class="btn btn-lg btn-success btn-block" id="button" type="submit" value="login" name="login" >  <br/>
									
      
                            </fieldset>  
                        </form>  
						<center>
						<b>Don't have an account</b>
						</center> 
						<br>
						<form action="register.php">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Register Now</button>  
						</form>
						
						<br/>
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
    <br/>
	<br/>
	<br/>
    <?php include ("footer.php"); ?>
      
    </body>  
    	
    </html>  
      
    <?php  
      
    include("db/dbConnection.php");  
      
    if(isset($_POST['login']))  
    {  
        $user_email=$_POST['email'];  
        $user_pass=$_POST['pass'];  
      
        $check_user="select * from Users WHERE Email='$user_email' AND Password='$user_pass'";  
      
        $query=mysqli_query($dbcon,$check_user);  
      
        if(mysqli_num_rows($query))  
        {  
	        $resultID=@mysqli_fetch_object($query);
	        $resultID=$resultID->UserID;
			 
            $information =<<<LinkHEREDOC
			<script> location.replace("index.php?id=$resultID"); </script>
						
LinkHEREDOC;
            mysqli_close($dbcon);
			echo $information;
            
        }  
        else  
        {  
          echo "<script>alert('Email or password is incorrect!')</script>";  
        }  
    }  
    ?>  