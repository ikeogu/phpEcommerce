<?php 
if(isset($_POST['search']) && $_POST['search']!=''){
$search=$_POST['search'];

    if(isset($_GET['id']) && $_GET['id']!= ''){
        $userID=$_GET['id'];
         header("Location:https://localhost/ecommerce/index.php?id=$userID&s=$search"); 
    }

else {
	header("Location:https://localhost/ecommerce/index.php?s=$search"); 
	}							
							
							
}
else{
	if(isset($_GET['id']) && $_GET['id']!=''){
$userID=$_GET['id'];
header("Location:https://localhost/ecommerce/index.php?id=$userID"); 
}

else {
	header("Location:https://localhost/ecommerce/index.php"); 
	}
	}


?>