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

								