<html>
<head>
  <title>Insert Drugs</title>
</head>

<body>

<?php 

include_once("config.php");

 if(isset($_POST['Submit'])) {    
	$drug_name=$_POST['drug_name'];
	$drug_brand=$_POST['drug_brand'];
	
	
	    if(empty($drug_name) || empty($drug_brand)) {                
        if(empty($drug_name)) {
            echo "<font color='red'>No Drug Name Added.</font><br/>";
        }
        
        if(empty($drug_brand)) {
            echo "<font color='red'>No Drug Brand Added.</font><br/>";
        }
        
			
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";	
		
		}else{
		  $query = "SELECT id FROM drug WHERE DrugBrand='".$drug_brand."'";  //*************************************************
		  if ($result=mysqli_query($mysqli,$query))
		  {
		  // Return the number of rows in result set
		  $rowcount=mysqli_num_rows($result);
		  
		  if($rowcount>0){
			  $message = 'You are Trying to insert to an existing Drug Brand!!!!.';
			  echo "<SCRIPT>
			  alert('$message');
			  </SCRIPT>";
			  die();
		  }  
		  
		  mysqli_free_result($result);
		  }   
          

		  
		$result=mysqli_query($mysqli,"INSERT INTO drug(DrugName,DrugBrand) VALUES ('$drug_name','$drug_brand')");//**************************
		$result2=mysqli_query($mysqli,"SELECT id from drug WHERE DrugBrand='".$drug_brand."'");//******************************
		$result3= mysqli_fetch_array($result2);//************************************
		$result4=$result3['id'];
		//echo $result4;
		$result5=mysqli_query($mysqli,"INSERT INTO pharmacydrug(DrId,PhId,Availability) VALUES ('$result4','111','yes')");//***********************************
		
		
		echo "<font size='18' color='green' face='Arial'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
		
		}
		
 }	
 ?>
 </body>
 </html>