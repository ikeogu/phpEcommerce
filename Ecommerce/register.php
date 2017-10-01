
    <html>  
     <head lang="en">  
    <meta charset="utf-8">
	<title>Jhotpot Registration Form</title>
	
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
                    $("#email_status").html("");
                }
                else {
                    //the email is not available
                    $("#email_status").html("Already in Database");
                }
            });
        });
    });
	
	</script>
    </head>  
    <style>  
        .login-panel {  
            margin-top: 70px;  
      
    </style>  
    <body>  
<?php include ("nav.php"); ?>
	
    <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
        <div class="row"><!-- row class is used for grid system in Bootstrap-->  
            <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
                <div class="login-panel panel panel-success">  
                    <div class="panel-heading">  
                        <h3 class="panel-title">Registration</h3>  
                    </div>  
                    <div class="panel-body">  
                        <form role="form" method="post" action="register.php">  
                            <fieldset>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="First Name" name="firstName" type="text" autofocus>  
                                </div>                               

								<div class="form-group">  
                                    <input class="form-control" placeholder="Last Name" name="lastName" type="text" >  
                                </div>
								
      
                                <div class="form-group">  
                                    <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" >
                                    <span id="email_status"></span>									
                                </div>  
								
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="">  
                                </div>  
								
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Mobile" name="mobile" type="mobile" value="">  
                                </div>  
   								
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Present Address" name="address" type="address" value="">  
                                </div>  
      
      
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >  
      
                            </fieldset>  
                        </form>  
                        <center>
						<b>Already registered ?</b> 
						
						</center>
						<br>
						<form action="login.php">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>  
						</form>
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
      
	  <?php include ("footer.php"); ?>
    </body>  
      
    </html>  
      
    <?php  
      
    include("db/dbConnection.php");//make connection here  
    if(isset($_POST['register']))  
    {  
        $user_firstName=$_POST['firstName'];
        $user_lastName=$_POST['lastName'];        
        $user_pass=$_POST['pass']; 
        $user_email=$_POST['email']; 
        $user_mobile=$_POST['mobile'];
        $user_address=$_POST['address'];
		$date=date("Y-m-d");
		
		
      //ip collecting
	  
	  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];    
	} 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];    
	} 
else {
	$ip = $_SERVER['REMOTE_ADDR'];    
	} 
	
        if($user_firstName=='')  
        {  
            //javascript use for input checking  
            echo"<script>alert('Please enter first name')</script>";  
    exit();//this use if first is not work then other will not show  
        }        
      
        if($user_lastName=='')  
        {  
            //javascript use for input checking  
            echo"<script>alert('Please enter last name')</script>";  
    exit();//this use if first is not work then other will not show  
        }        

      
        if($user_pass=='')  
        {  
            echo"<script>alert('Please enter the password')</script>";  
    exit();  
        }  
      
        if($user_email=='')  
        {  
            echo"<script>alert('Please enter the email')</script>";  
        exit();  
        }  
		      
        if($user_mobile=='')  
        {  
            echo"<script>alert('Please enter  mobile no')</script>";  
        exit();  
        }  
			      
        if($user_address=='')  
        {  
            echo"<script>alert('Please enter Address')</script>";  
        exit();  
        }  
		
    //if user already registered so can't register again.  
        $check_email_query="select * from users WHERE Email='$user_email'";  
        $run_query=mysqli_query($dbcon,$check_email_query) or die("failed to check already registered or not");  
      
        if(mysqli_num_rows($run_query)>0)  
        {  
    echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";  
    exit();  
        } 
		else

		
    //insert the user into the database.  
        $insert_user="insert into users (FirstName,LastName,Password,Email,Mobile,Address,IPAddress,RegisterDate) 
		             VALUE ('$user_firstName','$user_lastName','$user_pass','$user_email','$user_mobile','$user_address','$ip','$date')";  
        if(mysqli_query($dbcon,$insert_user))  
        {  
            echo"<script>alert('register success')</script>"; 
            mysqli_close($dbcon);			
        }  
		else
		{echo"<script>alert('register fail!')</script>";}
      
      
      
    }  
      
    ?>  