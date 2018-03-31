<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM drug WHERE id=$id");
$result2= mysqli_query($mysqli, "DELETE FROM pharmacydrug WHERE DrId=$id");
header("Location:index.php");
?>