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

///////making variable  for query
$name='ahmed ';
$description='ultra pro';
/////////////sql query will executed

$sql= "INSERT INTO `tripnew` ( `name`, `description`, `dt`) VALUES ( '$name', '$description', current_timestamp()) ";
$result= mysqli_query($conn, $sql); 
//////////check insert a table 
if($result){
    echo "Record has created succesfully! <br>";

}else{
    echo "Record has Not created  >>>". mysqli_error($conn);
}


?> 