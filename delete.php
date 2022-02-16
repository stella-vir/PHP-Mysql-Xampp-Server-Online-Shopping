<?php
  include('connect.php');
  $id = $_GET['id'];
  // backtick `Id` $id
  $q = "delete from grocerytb where `Id` = $id ";
  $conn -> query($q);
  // mysqli_query($conn, $q);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="content-type"
    content="text/html; charset=utf-8">

    <title>Deleting</title>

    <link rel="stylesheet" href=
'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="col-lg-4">
      <h1>Deleted.</h1>
      <a href="index.php"
      class='card-link'>
      Going back to main page...
      </a>
    </div>


    <div class="row mt-4">
      <form action="index.php" method="post">
        <input type="submit"
        class='btn btn-danger'
        name="btn" value='Yes'>
      </form>
    </div>

  </body>
</html>
