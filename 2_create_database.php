<?php

$servername= "localhost";
$username= "root";
$password = "";

$conn = mysqli_connect($servername,$username,$password );


if(!$conn)
{

    die(" sorry connecction is unsuccessfull ".mysqli_connect_error());
}
else{
    echo "Welcome to page!";
}

///create a database
$sql =  "CREATE DATABASE practice3 ";
$result= mysqli_query($conn, $sql);
if($result){
    echo "database created succesfully!";

}else{
    echo "Not created database >>>". mysqli_error($conn);
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