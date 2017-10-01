<?php 

include("db/dbConnection.php");
//get the passed parameter
$email = $_POST['email'];

//send a request to the database
$query = "select * from Users WHERE Email = '$email'";
$result = mysqli_query($dbcon , $query) or die("Could not get email: " );

if(mysqli_num_rows($result) == 0) {
    //email is already taken
    echo 1;
}
else {
    //email is available
    echo 0;
}
?>