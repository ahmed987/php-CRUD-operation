<?php

// make con
$servername = "localhost";
$username = "root";
$password = "";
$database = "practice";
$conn = mysqli_connect($servername, $username, $password, $database); // echo $result;

// getting id
$editId = ($_GET['id']);

// run sql on this id
$sqlEdit = "SELECT * FROM `tripnew` WHERE `id` = $editId";
// retult
$user_data = mysqli_query($conn, $sqlEdit);
$user_data = mysqli_fetch_assoc($user_data);


// for update
// run sql on this id

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name = $_POST['name'];
  $description = $_POST['description'];


  if ((preg_match("/^[a-zA-Z\s   ]+$/", $name)) && preg_match("/^[a-zA-Z ]+$/", $description)) {
    $sql_update_qry = "UPDATE `tripnew` SET `name` = ' $name', `description` = '$description' WHERE `tripnew`.`id` = $editId";
    // Execute the query
    if (mysqli_query($conn, $sql_update_qry)) {
      $editId = ($_GET['id']);

      // run sql on this id
      $sqlEdit = "SELECT * FROM `tripnew` WHERE `id` = $editId";

      // retult
      $user_data = mysqli_query($conn, $sqlEdit);
      $user_data = mysqli_fetch_assoc($user_data);

      session_start();
      $_SESSION['msg'] = 'Updated success';
      header("Location: 6_fetch_data.php");
    } else {
      // If the query failed, display an error message
      echo "Error updating record: " . mysqli_error($conn);
      die();
    }
  } else {
    echo '   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> ERROR ! </strong> USE ONLY alphbaets! (A-Z or a-z)
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    // die();
  }
}


// print_r($user_data); die();
?>


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
        <input type="text" value="<?php echo $user_data['name'] ?>" class="form-control" name="name" id="exampleInputName" aria-describedby="emailHelp" required="required">
      </div>

      <div class="mb-3">
        <label for="exampleInputDescription1" class="form-label">Description</label>
        <input type="text" value="<?php echo $user_data['description'] ?>" class="form-control" name="description" id="exampleInputDescription1" required="required">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</body>

</html>