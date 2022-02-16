<!-- javascript for browser runtime error
chrome.runtime.onMessage.addListener((request, sender, sendResponse) =>
{
  sendResponse();
  return true;
  }); -->

<?php
  include('connect.php');

  if (isset($_POST['btn'])) {
    $date=$_POST['idate'];
    $q = "select * from grocerytb WHERE Date='$date'";
    $query = $conn -> query($q);
    // $query = mysqli_query($conn, $q))
  } else {
    $q = 'select * from grocerytb';
    $query = $conn -> query($q);
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="content-type"
    content="text/html; charset=utf-8">

    <title>View list</title>

    <link rel="stylesheet" href=
'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="container mt-5">

      <div class="row">
        <div class="col-lg-8">
          <h1>View grocery list</h1>
          <a href="add.php">Add Item</a>
        </div>
        <div class="col-lg-4">
          <div class="row">
            <div class="col-lg-8">
              <form action="" method="post">
                <input type="date"
                  class='form-control'
                  name="idate">
                <div class="col-lg-4"
                  method='POST'>
                  <input type="submit"
                    class='btn btn-danger float-right'
                    name="btn" value="filter">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <?php
          while ($qq=mysqli_fetch_array($query))
          { ?>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class='card-title'>
                <?php echo $qq['Item_name']; ?>
              </h5>
              <h6 class='card-subtitle mb-2 text-muted'>
                <?php echo $qq['Item_quantity']; ?>
              </h6>
              <?php
              if($qq['Item_status'] == 0) { ?>
              <p class='text-info'>Pending</p>
              <?php
              } else if ($qq['Item_status'] == 1) { ?>
              <p class='text-success'>Bought</p>
              <?php
              } else { ?>
              <p class='text-danger'>Not available</p>
              <?php
              } ?>
              <a href=
              "delete.php?id=<?php echo $qq['Id']; ?>"
                class='card-link'>
                Delete
              </a>
              <a href=
              "update.php?id=<?php echo $qq['Id']; ?>"
                class='card-link'>
                Update
              </a>
            </div>
          </div><br>
        </div>
        <?php
        } ?>
      </div>
    </div>

  </body>
</html>
