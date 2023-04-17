<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "practice";

$conn = mysqli_connect($servername, $username, $password, $database);


  



if(isset($_GET['id'])){
  $dtId = $_GET['id'];
  // rest of the code
  
  
   $deleteId="DELETE FROM `tripnew` WHERE `tripnew`.`id` = $dtId";
   $deleteResult= mysqli_query($conn,$deleteId);
  //  print_r($dtId);
  //  echo "<pre> ";
  //  die();
  header("Location: 6_fetch_data.php");
  
}






//  $deleteId =($_GET['id']);


?>