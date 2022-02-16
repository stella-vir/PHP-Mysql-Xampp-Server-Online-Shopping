<?php
  print_r($_POST);
?>

<?php
  include('connect.php');

  if (isset($_POST['btn'])) {
    $item_name=$_POST['iname'];
    $item_qty=$_POST['iqty'];
    $istatus=$_POST['istatus'];
    $date=$_POST['idate'];
    $id=$_GET['id'];
    // remember backtick``
    $q="update grocerytb set `Item_name`='$item_name', `Item_quantity`='$item_qty',
    `Item_status`='$istatus', `Date`='$date' where `Id`=$id";
    $query = $conn -> query($q);
    // $query=mysqli_query($conn, $q);
    header('location:index.php');
  } else if (isset($_GET['id'])) {
    $q= "select * from grocerytb where `Id`='".$_GET['id']."'";
    $query = $conn -> query($q);
    // $query=mysqli_query($conn, $q);
    $res=mysqli_fetch_array($query);
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="content-type"
    content="text/html; charset=utf-8">

    <title>Update list</title>

    <link rel="stylesheet" href=
'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="container mt-5">
      <h1>Update grocery list</h1>
      <form method="post">
        <div class="form-group">
          <label>Item name</label>
          <input type="text"
            class='form-control'
            placeholder="Item name"
            name="iname"
            value=
      "<?php echo $res['Item_name']; ?>" />
        </div>

        <div class="form-group">
          <label>Item quantity</label>
          <input type="text"
            class='form-control'
            placeholder="Item quantity"
            name="iqty"
            value=
      "<?php echo $res['Item_quantity']; ?>" />
        </div>

        <div class="form-group">
          <label>Item status</label>
          <select
            class='form-control'
            name="istatus">
            <?php
            if($res['Item_status'] == 0) { ?>
              <option value="0" selected>
                Pending
              </option>
              <option value="1">
                Bought
              </option>
              <option value="2">
                Not available
              </option>
            <?php
            } else if($res['Item_status'] == 1) { ?>
              <option value="0">
                Pending
              </option>
              <option value="1" selected>
                Bought
              </option>
              <option value="2">
                Not available
              </option>
            <?php
            } else if($res['Item_status'] == 2) { ?>
              <option value="0">
                Pending
              </option>
              <option value="1">
                Bought
              </option>
              <option value="2" selected>
                Not available
              </option>
            <?php
            } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Date</label>
          <input type="date"
            class='form-control'
            placeholder="Date"
            name="idate"
            value=
      "<?php echo $res['Date']?>">
        </div>

        <div class="form-group">
          <input type="submit"
            value='Update'
            class="btn btn-danger"
            name="btn">
        </div>
      </form>
    </div>

  </body>
</html>
