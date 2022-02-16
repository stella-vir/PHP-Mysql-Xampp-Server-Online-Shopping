
<?php
  print_r($_POST);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="content-type"
    content="text/html; charset=utf-8">

    <title>Add list</title>

    <link rel="stylesheet" href=
'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="container mt-5">
      <h1>Add grocery list</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <!-- <form action="add.php" method="post"> -->
        <div class="form-group">
          <label>Item name</label>
          <input type="text"
            class='form-control'
            placeholder="Item name"
            name="iname" />
        </div>

        <div class="form-group">
          <label>Item quantity</label>
          <input type="text"
            class='form-control'
            placeholder="Item quantity"
            name="iqty" />
        </div>

        <div class="form-group">
          <label>Item status</label>
          <select
            class='form-control'
            name="istatus">
            <option value="0">
              Pending
            </option>
            <option value="1">
              Bought
            </option>
            <option value="2">
              Not available
            </option>
          </select>
        </div>

        <div class="form-group">
          <label>Date</label>
          <input type="date"
            class='form-control'
            placeholder="Date"
            name="idate">
        </div>

        <div class="form-group">
          <input type="submit"
            class="btn btn-danger"
            name="btn" value='Add'>
        </div>

      </form>
    </div>

    <?php
      if (isset($_POST['btn'])) {
        include('connect.php');
        $item_name=$_POST['iname'];
        $item_qty=$_POST['iqty'];
        $item_status=$_POST['istatus'];
        $date=$_POST['idate'];

        // remember to add backtick``
        $q="insert into grocerytb(`Item_name`, `Item_quantity`, `Item_status`, `Date`)
        values('$item_name', $item_qty, '$item_status', '$date')";

        echo ' Here';

        if ($result = $conn -> query($q)) {
        // $result = mysqli_query($conn, $q))
          printf(' There', $result -> num_rows);
          // echo 'There' . $result -> num_rows;
          // $result -> free_result();
          // $conn -> close();
          // mysqli_close($conn);
          echo ' Where';
          header('location: index.php');
          //exit();
        }
      }
    ?>

  </body>
</html>
