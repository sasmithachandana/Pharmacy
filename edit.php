<?php

include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $drug_name=$_POST['drug_name'];
    $drug_brand=$_POST['drug_brand'];   
    
    
	
    if(empty($id) || empty($drug_name) || empty($drug_brand)) {            
        if(empty($id)) {
            echo "<font color='red'>id field is empty.</font><br/>";
        }
        
        if(empty($drug_name)) {
            echo "<font color='red'>Drug Name field is empty.</font><br/>";
        }
        
        if(empty($drug_brand)) {
            echo "<font color='red'>Drug Brand field is empty.</font><br/>";
        }        
    } else {    
       	   
        $query = "SELECT * FROM drug WHERE DrugBrand='".$drug_brand."'";  
		  if ($result=mysqli_query($mysqli,$query))
		  {
		  $rowcount=mysqli_num_rows($result);
		  
		  if($rowcount>0){
			  $message = 'The Drug brand you have updated exists!!!';
			  echo "<SCRIPT>
			  alert('$message');
			  </SCRIPT>";
			  die();
		  }else{  
		  $result = mysqli_query($mysqli, "UPDATE drug SET DrugName='$drug_name',DrugBrand='$drug_brand' WHERE id=$id");
		  }
		  mysqli_free_result($result);
		 }
        
        header("Location: index.php");
    }
}
?>
<?php
error_reporting(0);
 $id = $_GET['id'];
 

$result = mysqli_query($mysqli, "SELECT * FROM drug WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $drug_name= $res['drug_name'];
    $drug_brand= $res['drug_brand'];
   
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="4style.css" />
<title>Update Drugs</title>

<style type="text/css">
.auto-style1 {
	background-color: #008080;
}
.auto-style3 {
	font-size: 15px;
	font-weight: bold;
	color: #000000;
}
</style>

</head>

<body>
    <div id="page" style="left: 0px; top: 39px; height: 479px">
		
        <div id="header">
            <ul>
           	   	<li><a href="home.html">Home</a></li>
               	<li><a href="add.html">Insert</a></li>
                <li><a href="index.php">Edit/Delete</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
  <div class="dotted_line"></div>
        <div id="main">
        
        	<div class="main_left">
            	<img src="imgs/img2.jpg"  height="328" width="443" />
                <h1>&nbsp;</h1>
            </div>
            
           	<div class="main_right">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Insert 
				Drugs </h2>
                
                <p><form name="form1" method="post" action="edit.php">
        <table border="0" style="width: 79%; height: 204px">
            <tr> 
                <td class="auto-style3">Drug Name</td>
                <td><input type="text" name="drug_name" value="<?php echo $drug_name;?>" style="border-style: none; border-color: inherit; border-width: thin; height: 33px; width: 240px; background-color: #CCCCCC;" required></td>
            </tr>
            <tr> 
                <td class="auto-style3">Dru Brand</td>
                <td><input type="text" name="drug_brand" value="<?php echo $drug_brand;?>" style="border-style: none; border-color: inherit; border-width: thin; height: 33px; width: 240px; background-color: #CCCCCC;" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update" class="auto-style1" style="font-weight: bold; font: 100% 'Adobe Caslon Pro Bold'; width: 148px; height: 37px; background-color: #008080"></td>
            </tr>
        </table>
    </form></p>

            </div>
            
           	<div class="main_bottom"></div>
            
        </div>
        
        
        <div class="dotted_line"></div>
        
        </div>
	<p>cac</p>
	<p>c,c,</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</body>
</html>
