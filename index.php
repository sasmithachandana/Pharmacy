<?php
include_once("config.php"); 
$result = mysqli_query($mysqli, "SELECT * FROM drug ORDER BY id DESC"); // using mysqli_query instead
?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="3style.css" />
<title>Edit/Delete Drugs</title>

</head>

<body>
    <div id="page" style="left: 0px; top: 39px; height: auto">
		
        <div id="header">
            <ul>
           	   	<li><a href="home.html">Home</a></li>
               	<li><a href="add.html">Insert</a></li>
                <li><a href="index.php">Edit/Delete</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        
        
        <div class="dotted_line" style="height:auto; background-color: #FFFFFF">
			<table width='80%' border=1 style="border-collapse:collapse;" >
        <tr bgcolor='#CCCCCC'>
            <td width="50">Drug Name</td>
            <td width="50">Drug Brand</td>
            <td width="50"></td>
			<td width="50"></td>
        </tr>
        <?php 
        
		
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['DrugName']."</td>";
            echo "<td>".$res['DrugBrand']."</td>";   
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a></td><td><a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
		
		</div>
        
        </div>
	<p>cac</p>
	<p>c,c,</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</body>
</html>
