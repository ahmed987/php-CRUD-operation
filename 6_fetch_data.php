<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "practice";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name = trim($_POST['name']);
  $description = trim($_POST['description']);
  if ($name && $description) {
    // print_r($name); 
    // die();

    if ((preg_match("/^[a-zA-Z ]+$/", $name)) && preg_match("/^[a-zA-Z ]+$/", $description)) {

      $sql = "INSERT INTO `tripnew` ( `name`, `description`, `dt`) VALUES ( '$name', '$description', current_timestamp()) ";

      if (mysqli_query($conn, $sql)) {
        echo '   <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> Submited! </strong> Name, and description submit successfully!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      } else {
        die("Something went wrong");
      }
    } else {
      // session_start();
      $_SESSION['msg'] = 'this is error';
      echo '   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> error ! </strong> USE ONLY alphbaets!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
  }else {
    echo '   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> ERROR ! </strong> Please enter Name & Description
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

    
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
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['msg'])) {
  ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong> Msg: </strong> <?php echo $_SESSION['msg'] ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  <?php }
  session_destroy();
  ?>


  <div class="container mt-4 ">
    <h1>
      <center> Enter Name and Description</center>
    </h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <!-- <form method="POST"> -->
      <div class="mb-3">
        <label for="exampleName1" class="form-label">Name</label>
        <input value="" type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="emailHelp" required="required">
      </div>

      <div class="mb-3">
        <label for="exampleInputDescription1" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" id="exampleInputDescription1" required="required">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <?php
  $sqlRead = "SELECT * FROM `tripnew` ";

  // Execute query
  $result = mysqli_query($conn, $sqlRead);

  // Loop through result set
  echo '<div class="container mt-4"> 
            <table class="table  table-dark table-striped"
                <thead>
            <tr>
                <th>Heading 1</th>
                <th>Heading 2</th>
                <th>Edit</th>
                <th>Delete</th>  
            </tr>
                </thead>
        <tbody>

';
  // href="9_delete_data.php?id=' . $row['id'] . '"
  while ($row = mysqli_fetch_assoc($result)) {

    echo '
    <tr>
        <td>' . $row['name'] . '</td>
        <td>' . $row['description'] . '</td>
        <td><a style="color: white;text-decoration:none;" href="8_edit.php?id=' . $row['id'] . '"><button type="button"  class="btn btn-primary"> edit</button></a></td>
        <td><a style="color: white;text-decoration:none;" ><button type="button" class="btn btn-danger  delete_btn" data-id="'. $row['id'] .'"> delete     </button></a></td>        
    </tr>
';
  }
  echo '
            </tbody>  
        </table>
    </div>  ';  ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

<script>
  $(document).on('click', '.delete_btn', function() {
   id =  $(this).data('id');
    Swal.fire({
      title: 'Are you sure want to delete?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "9_delete_data.php?id="+ id;

        // Swal.fire(
        //   'Deleted!',
        //   'Your file has been deleted.',
        //   'success'
        // )
      }
    })
  });
</script>

</html>