<?php 
  include("database.php");
?>

<?php 
  include("inc/header.php")
?>

<?php 
  include("inc/footer.php")
?>


<!-- Form -->
<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- CHECK THIS OUT! This comes in handy -->
      <?php if(isset($_SESSION['message'])) { ?>
          <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
      <?php session_unset(); } ?>

      <div class="card card-body">
        <form action="add.php" method="POST">
          <div class="form-group">
            <input type="text" name="first_name" class="form-control" placeholder="First Name" autofocus >
          </div>
          <div class="form-group">
            <input type="text" name="last_name" class="form-control" placeholder="Last Name" autofocus required>
          </div>
          <div class="form-group">
            <textarea name="address" rows="3" class="form-control" placeholder="Address" autofocus ></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" autofocus >
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Email" autofocus >
          </div>
          <div class="form-group">
            <input type="text" name="alt_address" class="form-control" placeholder="Alternate Address" autofocus >
          </div>
          <input type="submit" class="btn btn-success btn-block" name="add" value="Add">
        </form>
      </div>

    </div>

    <div class="col-md-4">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Alternate Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $query = "SELECT * FROM info";
            $result_tasks = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result_tasks)){ ?>
              <tr>
                <td><?php echo $row['first_name']?></td>
                <td><?php echo $row['last_name']?></td>
                <td><?php echo $row['address']?></td>
                <td><?php echo $row['phone_number']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['alt_address']?></td>
                <td>
                <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-secondary">Update
                
              </a>
                </td>
              </tr>


            <?php } ?>
         
        </tbody>

      </table>
    </div>

  </div>

</div>

<?php



$result = @mysqli_query($conn, "SELECT * FROM info") or die("Error: " . mysqli_error($conn));


if(isset($_POST['chk_id']))
{
    $arr = $_POST['chk_id'];
    foreach ($arr as $id) {
        @mysqli_query($conn,"DELETE FROM info WHERE id = " . $id);
    }

    $_SESSION['message'] = "Person(s) removed from address book";
    $_SESSION['message_type'] = "danger";
    header("location: index.php");
    
}

?>



