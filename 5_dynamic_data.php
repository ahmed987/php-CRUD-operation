<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "practice";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name = $_POST['name'];
  $description = $_POST['description'];

  $sql = "INSERT INTO `tripnew` ( `name`, `description`, `dt`) VALUES ( '$name', '$description', current_timestamp()) ";

  if (mysqli_query($conn, $sql)) {
    echo '   <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>submited successfully! </strong> Name, and description submit successfully!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  } else {
    die("Something went wrong");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dynamic</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-4 ">
    <h1>
      <center> Enter Data</center>
    </h1>

    <form method="POST">
      <div class="mb-3">
        <label for="exampleName1" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputDescription1" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" id="exampleInputDescription1">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</body>

</html>