<?php

$servername= "localhost";
$username= "root";
$password = "";
$database ="practice";
////////////////connection/////////////////////////////////////////
$conn = mysqli_connect($servername,$username,$password,$database );


if(!$conn)
{

    die(" sorry connecction is unsuccessfull ".mysqli_connect_error());
}
else{
    echo "Welcome to page!";
}
//////////////////end///////////////////////////////////

//////////create a table in database////////////////////////////////

$sql= "CREATE TABLE `practice`.`tripnew` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(200) NOT NULL , `description` TEXT NOT NULL , `dt` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ";
$result= mysqli_query($conn, $sql);
if($result){
    echo "TABLE created succesfully!";

}else{
    echo "TABLE Not created  >>>". mysqli_error($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>HEADING 1</h1>
</body>
</html>