
    <html>  
     <head lang="en">  
    <meta charset="utf-8">
	<title>Product Upload</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
    <style>
	.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
	</style>
    </head>  
    <style>  
        .login-panel {  
            margin-top: 150px;  
      
    </style>  
    <body>  
<?php include ("nav.php"); ?>
	
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">  
                    <div class="panel-heading">  
                        <h3 class="panel-title">Product Upload Form</h3>  
                    </div>  
                    <div class="panel-body">  
                        <form role="form" method="post" action="admin.php" enctype="multipart/form-data" >  
                            <fieldset>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="product name" name="productName" type="text" autofocus>  
                                </div>                               

								<div class="form-group">  
                                    <input class="form-control" placeholder="product price" name="productPrice" type="number" >  
                                </div>
								
      
                                <div class="form-group">  
								<span class="btn btn-default btn-file">
								    Image Upload
                                    <input  name="file" type="file" >
                                </span>    								
                                </div>  
								
                               <?php
include("db/dbConnection.php");

$query= "select * from category";

$result =mysqli_query($dbcon,$query) or die('Error: ' . mysqli_error($dbcon));;
$encode = array();

while($row = mysqli_fetch_assoc($result)) {
   $encode[] = $row;
}

$result=json_encode($encode); 
$result=json_decode($result);
$html = <<<CategoryHereDoc
								<div class="form-group" >  
                                    <select class="form-control" name="productCategory" >
                               
								
CategoryHereDoc;

foreach($result as $Category){
	

$CategoryID=$Category->CategoryCode;
$CategoryName=$Category->CategoryName;

//echo $CategoryID;
//echo $CategoryName;
$html .=<<<CategoryHereDoc
								
                                    <option value="$CategoryID">$CategoryName</option>
								
CategoryHereDoc;

//echo $CategoryID;
}
$html .=<<<CategoryHereDoc
                                    </select>   
                                </div>  								
CategoryHereDoc;

echo $html;

?>
			
								
                                <div class="form-group">  
                                    <textarea class="form-control" placeholder="product Description" name="productDescription" type="text" >  </textarea>
                                </div>  
								<br/>                                   
								<br/>                                   
                                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upload product" name="admin" >  
      
                            </fieldset>  
                        </form>  
                       <br/>
                       <br/>
						
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
     <br/> 
	  <?php include ("footer.php"); ?>
    </body>  
      
    </html>  
      
    <?php  
      
    include("db/dbConnection.php");//make connection here  
    if(isset($_POST['admin']))  
    {  

        $productImage= $_FILES['file']['name'];
 
	    //	echo $name;
	    $tmp_name= $_FILES['file']['tmp_name'];
	    $location='img/';
	    $target='img/'.$productImage;
		//echo $productImage;
	
        $productName=$_POST['productName'];
        $productPrice=$_POST['productPrice'];
        $productCategory=$_POST['productCategory'];
        //$productImage=$_POST['productImage'];
        $productDescription=$_POST['productDescription'];
		      
      
        if($productName=='')  
        {  
            
            echo"<script>alert('Please enter product name')</script>";  
    exit();
        }        
      
        if($productPrice=='')  
        {  
            
            echo"<script>alert('Please enter product price')</script>";  
    exit();
        }        
      
        if($productImage=='')  
        {  
            
            echo"<script>alert('Please enter product Image')</script>";  
    exit();
        }        
      
        if($productCategory=='')  
        {  
            
            echo"<script>alert('Please enter product category')</script>";  
    exit();
        }        
      
        if($productDescription=='')  
        {  
            
            echo"<script>alert('Please enter product Description')</script>";  
    exit();
        }        

    //insert Product into the database.  
	if(move_uploaded_file($tmp_name,$location.$productImage)){
		
        $insert_Product="insert into product ( ProductName,ProductPrice,ProductImage,CategoryCode ,ProductDescription) VALUES ('$productName' ,'$productPrice' ,'$target','$productCategory','$productDescription')";  
       
	   mysqli_query($dbcon,$insert_Product) or die('Error: ' . mysqli_error($dbcon));;
      
    } 
      
    }  
      
    ?>  